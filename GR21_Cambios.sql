-- B) ELABORACIÓN DE RESTRICCIONES

/* inciso a: Se debe consistir que la fecha de inicio de la publicación de la edición sea
   anterior a la fecha de fin de la publicación del mismo si esta última no es nula. */
ALTER TABLE gr21_evento_edicion
ADD CONSTRAINT ck_fecha_fin
CHECK (fecha_fin_pub IS NULL OR fecha_inicio_pub < fecha_fin_pub);

/* inciso b: Cada categoría no debe superar las 50 subcategorías. */
ALTER TABLE g21_subcategoria
ADD CONSTRAINT max_subcategorias
CHECK (NOT EXISTS(
    SELECT 1
    FROM g21_subcategoria
    GROUP BY id_categoria
    HAVING count(distinct id_subcategoria) > 50
));

/* inciso c: La suma de los aportes que recibe una edición de un evento de sus patrocinantes
   no puede superar el presupuesto establecido para la misma. */
CREATE ASSERTION ASS_max_presupuesto
CHECK (NOT EXISTS(
    SELECT 1
    FROM g21_evento_edicion ed
        JOIN g21_patrocinios p
        ON (ed.id_evento = p.id_evento AND ed.nro_edicion = p.nro_edicion)
    GROUP BY ed.id_evento, ed.nro_edicion, ed.presupuesto
    HAVING sum(p.aporte) < ed.presupuesto
));

/* inciso d: Los patrocinantes solo pueden patrocinar ediciones de eventos de su mismo distrito. */
CREATE ASSERTION ASS_patrocinantes_mismo_distrito_evento
CHECK (NOT EXISTS(
    SELECT 1
    FROM g21_patrocinante pr
        JOIN g21_patrocinios p ON (pr.id_patrocinate = p.id_patrocinate)
        JOIN g21_evento_edicion ed ON (p.id_evento = ed.id_evento AND p.nro_edicion = ed.nro_edicion)
        JOIN g21_evento e ON (ed.id_evento = e.id_evento)
    WHERE pr.id_distrito != e.id_distrito
));

--C) SERVICIOS

/* inciso a: Cuando se crea un evento debe crear las ediciones de ese evento, colocando como
   fecha inicial el 1 del mes en el cual se creó el evento y como presupuesto, el mismo del
   año pasado más un 10 %. En caso de que no hubiera uno el año pasado, colocar 100000. */
create or replace function FN_GR21_crear_edicion_evento() returns trigger as
$$
    declare
        ultimaEdicion int;
        nroEdicion int;
        fechaInicial date;
        presupuestoAnioPasado int;
        presupuestoActual int;
    begin
        if tg_table_name = 'gr21_evento' then
            /* se determina cuál es el número de la última edición buscando
            el número más grande asociado al evento que se quiere agregar. */
            select max(nro_edicion) into ultimaEdicion
            from gr21_evento_edicion
            where id_evento = new.id_evento
            group by id_evento;

            /* si ultimaEdicion es null quiere decir que todavía no existe ninguna edición
            de ese evento. Por lo tanto el que se quiere agregar va a ser el primero. */
            if ultimaEdicion is null then
                nroEdicion = 1;
            else
                nroEdicion = ultimaEdicion + 1;
            end if;

            /* se determina la fecha inicial: año actual (2020) - mes - dia (1) */
            fechaInicial = date(concat(extract(year from current_date), '-', new.mes_evento, '-', 1));

            /* se busca presupuesto del mismo evento pero del año pasado. Si no existe se asigna 100000 */
            select presupuesto into presupuestoAnioPasado
            from gr21_evento
                join gr21_evento_edicion on gr21_evento.id_evento = gr21_evento_edicion.id_evento
            where extract(year from fecha_inicio_pub) = extract(year from fechaInicial) - 1;

            if presupuestoAnioPasado is null then
                presupuestoActual = 100000;
            else
                presupuestoActual = presupuestoAnioPasado + 10 * presupuestoAnioPasado / 100; --> presupuestoAnioPasado + 10%
            end if;

            insert into gr21_evento_edicion (id_evento, nro_edicion, fecha_inicio_pub, fecha_fin_pub, presupuesto, fecha_edicion)
            values (new.id_evento, nroEdicion, fechaInicial, null, presupuestoActual, date(concat(extract(year from current_date), '-', new.mes_evento, '-', new.dia_evento)));

            if new.repetir is true then
                insert into gr21_evento_edicion (id_evento, nro_edicion, fecha_inicio_pub, fecha_fin_pub, presupuesto, fecha_edicion)
                values (new.id_evento, nroEdicion+1, date(concat(extract(year from current_date)+1, '-', new.mes_evento, '-', 1)), null, presupuestoActual, date(concat(extract(year from current_date)+1, '-', new.mes_evento, '-', new.dia_evento)));
            end if;
        end if;
        if tg_table_name = 'gr21_evento_edicion' then
            /* se busca presupuesto del mismo evento pero del año pasado. Si no existe se asigna 100000 */
            select presupuesto into presupuestoAnioPasado
            from gr21_evento join gr21_evento_edicion
                 on gr21_evento.id_evento = gr21_evento_edicion.id_evento
            where extract(year from fecha_inicio_pub) = extract(year from new.fecha_inicio_pub) - 1
                and gr21_evento.id_evento = new.id_evento;

            if presupuestoAnioPasado is null then
                presupuestoActual = 100000;
            else
                presupuestoActual = presupuestoAnioPasado + 10 * presupuestoAnioPasado / 100; --> presupuestoAnioPasado + 10%
            end if;

            update gr21_evento_edicion
            set presupuesto = presupuestoActual
            where id_evento = new.id_evento and nro_edicion = new.nro_edicion;

            if new.fecha_edicion is null then
                update gr21_evento_edicion
                set fecha_edicion = current_date
                where id_evento = new.id_evento and nro_edicion = new.nro_edicion;
            end if;

        end if;
        return new;
    end;
$$
language 'plpgsql';

create trigger TR_GR21_g21_evento_checkEvento
after insert
on gr21_evento
for each row execute procedure FN_GR21_crear_edicion_evento();

create trigger TR_GR21_g21_evento_edicion_checkEvento
after insert
on gr21_evento_edicion
for each row execute procedure FN_GR21_crear_edicion_evento();

/* Esta función se encarga de sincronizar las fechas de la tabla 'g21_evento_edicion'
   cuando se cambia el día y/o mes de un evento en la tabla 'g21_evento'. */
create or replace function FN_GR21_sync_fechas() returns trigger as
$$
    declare
    begin
        -- Si se modificó el día, entonces actualizo 'fecha_edicion'
        if old.dia_evento != new.dia_evento then
            update gr21_evento_edicion
            set fecha_edicion = date(concat(extract(year from fecha_edicion), '-', extract(month from fecha_edicion), '-', new.dia_evento))
            where id_evento = new.id_evento;
        end if;
        -- Si se modificó el mes, entonces actualizo 'fecha_edicion' y 'fecha_inicio_pub'
        if old.mes_evento != new.mes_evento then
            update gr21_evento_edicion
            set fecha_edicion = date(concat(extract(year from fecha_edicion), '-', new.mes_evento, '-', extract(day from fecha_edicion)))
            where id_evento = new.id_evento;

            update gr21_evento_edicion
            set fecha_inicio_pub = date(concat(extract(year from fecha_inicio_pub), '-', new.mes_evento, '-', 1))
            where id_evento = new.id_evento;
        end if;
        return new;
    end;
$$
language 'plpgsql';

create trigger TR_GR21_g21_evento_sync_fechas
after update of dia_evento, mes_evento
on gr21_evento
for each row execute procedure FN_GR21_sync_fechas();

/* Se considera que el atributo 'fecha_edicion' de la tabla 'evento_edicion' no puede ser nulo,
   ya que toda edición de un evento particular debiera tener una fecha determinada. */
ALTER TABLE gr21_evento_edicion
    ALTER COLUMN fecha_edicion SET NOT NULL;

/* 'fecha_edicion' no puede ser menor a 'fecha_inicio_pub' porque no tendría
   sentido que se publique la edición de un evento que ya tuvo lugar en el pasado. */
alter table gr21_evento_edicion
add constraint check_fecha_edicion
check (fecha_edicion >= fecha_inicio_pub);

/* 'fecha_inicio_pub' tiene que tener dia = 1
   según lo solicitado en el inciso c (Servicios). */
alter table gr21_evento_edicion
add constraint check_fecha_inicio_pub
check (extract(day from fecha_inicio_pub) = 1);


insert into gr21_usuario (id_usuario, nombre, apellido, e_mail, password) values (1, 'pedro', 'chatelain', 'd', 'jajaxxx');

insert into gr21_categoria (id_categoria, nombre_categoria) values (1, 'dea');

insert into gr21_subcategoria (id_categoria, id_subcategoria, nombre_subcategoria) values (1, 1, 'deaxxx');

insert into gr21_evento
    (id_evento, nombre_evento, descripcion_evento, id_categoria, id_subcategoria, id_usuario, id_distrito, dia_evento, mes_evento, repetir)
values (1, 'dearlp', 'dearlxeo', 1, 1, 1, null, 5, 8, true);

insert into gr21_evento_edicion (id_evento, nro_edicion, fecha_inicio_pub, fecha_fin_pub, presupuesto, fecha_edicion)
values (1, 3, '2022-4-1', '2022-6-1', 3, '2022-4-5');

update gr21_evento set dia_evento = 10, mes_evento = 10 where id_evento = 1;

select * from gr21_evento; select * from gr21_evento_edicion;


--D-----------------VISTAS-----------------
--A-Identificador de los Eventos cuya fecha de realización de su último encuentro esté en el primer trimestre de 2020.
--CREATE VIEW

-- ->to check requirements
/*CREATE VIEW G21_ultimo_evento_primer_trimestre AS
SELECT * FROM g21_evento
WHERE
WITH LOCAL CHECK OPTION;*/

--B-Datos completos de los distritos indicando la cantidad de eventos en cada uno
--NO ACTUALIZABLE->COUNT(*)
CREATE VIEW G21_cant_eventos_distrito AS
SELECT d.id_distrito, d.nombre_pais, d.nombre_provincia, d.nombre_distrito, count(*) as Cantidad_eventos
FROM g21_distrito d
JOIN g21_evento e
ON (d.id_distrito = e.id_distrito)
GROUP BY d.id_distrito
ORDER BY id_distrito;
--C-Datos Categorías que poseen eventos en todas sus subcategorías.
--ACTUALIZABLE->PRESERVED KEY
CREATE VIEW G21_cat_wit_subcat_without_events AS
SELECT c.id_categoria, c.nombre_categoria
FROM g21_categoria c
JOIN g21_subcategoria s
ON c.id_categoria = s.id_categoria
WHERE NOT EXISTS(
    SELECT 1
    FROM g21_evento e
    WHERE (s.id_categoria = e.id_categoria AND s.id_subcategoria = e.id_subcategoria)
    )
GROUP BY c.id_categoria
ORDER BY c.id_categoria;
--D-----------------SITIO-----------------
--1-Listado del TOP 10 de usuarios que participa en más eventos. getTopUsers
--view top 10 users -> actualizable
CREATE VIEW G21_top_usuarios_events AS
SELECT u.id_usuario, u.nombre, u.apellido, u.e_mail, u.password, count(*) AS cant_eventos_usuario
FROM g21_usuario u
JOIN g21_evento e
ON u.id_usuario = e.id_usuario
GROUP BY u.id_usuario
ORDER BY 6 DESC, 1
LIMIT 10;
--getView
SELECT * FROM G21_top_usuarios_events;--vista de top users
--2-Listado de usuarios de acuerdo a un patrón de búsqueda que contenga todos los datos del usuario
-- junto con la cantidad de participaciones que tenga. getUserWithFilter() -> userDate+count(participation)

