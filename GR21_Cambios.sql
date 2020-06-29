------------------------------------------ B) ELABORACIÓN DE RESTRICCIONES-------------------------------------------------------------------

/* --------------- inciso a: Se debe consistir que la fecha de inicio de la publicación de la edición sea -----------------
   --------------- anterior a la fecha de fin de la publicación del mismo si esta última no es nula. ---------------------- */
ALTER TABLE gr21_evento_edicion
ADD CONSTRAINT ck_fecha_fin
CHECK (fecha_fin_pub IS NULL OR fecha_inicio_pub < fecha_fin_pub);

/* INSERT INTO gr21_evento_edicion (id_evento, nro_edicion, fecha_inicio_pub, fecha_fin_pub, presupuesto, fecha_edicion)
VALUES (12, 1, '2020-3-1', '2020-1-9', 100000, '2020-3-6'); */

-----------------------------------inciso b: Cada categoría no debe superar las 50 subcategorías. --------------------------------------------

/*
ALTER TABLE gr21_subcategoria
ADD CONSTRAINT max_subcategorias
CHECK (NOT EXISTS(
    SELECT 1
    FROM gr21_subcategoria
    GROUP BY id_categoria
    HAVING count(id_subcategoria) > 50
)); */

CREATE OR REPLACE FUNCTION TRFN_GR21_maximo_subcategorias() RETURNS TRIGGER AS $$
    DECLARE
        max_subcategorias int = 50;
    BEGIN
        if exists(
            SELECT 1
            FROM gr21_subcategoria
            WHERE id_categoria = new.id_categoria
            GROUP BY id_categoria
            HAVING count(id_subcategoria) >= max_subcategorias
        ) then
            raise exception 'Ya se alcanzó la cantidad máxima de subcategorías (%)', max_subcategorias;
        end if;
        return new;
    END $$
LANGUAGE 'plpgsql';

CREATE TRIGGER TR_GR21_maximo_subcategorias
BEFORE INSERT OR UPDATE OF id_categoria
ON gr21_subcategoria
FOR EACH ROW
EXECUTE PROCEDURE TRFN_GR21_maximo_subcategorias();

/* INSERT INTO gr21_subcategoria (id_categoria, id_subcategoria, nombre_subcategoria)
VALUES (1, 51, 'Subcategoria50'); (Suponiendo que existen 50 subcategorias con id_categoria = 1). */

/* --------------- inciso c: La suma de los aportes que recibe una edición de un evento de sus patrocinantes -----------------
   --------------- no puede superar el presupuesto establecido para la misma.  ----------------------------------------------- */

/*
CREATE ASSERTION ASS_max_presupuesto
CHECK (NOT EXISTS(
    SELECT 1
    FROM gr21_evento_edicion ed
    JOIN g21_patrocinios p
    ON (ed.id_evento = p.id_evento AND ed.nro_edicion = p.nro_edicion)
    GROUP BY ed.id_evento, ed.nro_edicion, ed.presupuesto
    HAVING sum(p.aporte) > ed.presupuesto
)); */

--TRIGGERS & FUNCTIONS:

--EVENTO EDICION

CREATE OR REPLACE FUNCTION TRFN_GR21_presupuesto_mayor_aporte_ed() RETURNS TRIGGER AS $$
    DECLARE
        suma_aporte int;
    BEGIN
        SELECT sum(aporte) INTO suma_aporte
        FROM gr21_patrocinios p
        WHERE p.id_evento = OLD.id_evento
        AND p.nro_edicion = OLD.nro_edicion;
        IF (suma_aporte > NEW.presupuesto) THEN
            RAISE EXCEPTION 'Los aportes (%) son mayores al presupuesto: %', suma_aporte, NEW.presupuesto;
        END IF;
        RETURN NEW;
    END $$
LANGUAGE 'plpgsql';

CREATE TRIGGER TR_GR21_presupuesto_mayor_aporte
BEFORE UPDATE OF presupuesto
ON gr21_evento_edicion
FOR EACH ROW
EXECUTE PROCEDURE TRFN_GR21_presupuesto_mayor_aporte_ed();

--PATROCINIOS

CREATE OR REPLACE FUNCTION TRFN_GR21_presupuesto_mayor_aporte_patrocinio() RETURNS TRIGGER AS $$
    DECLARE
        suma_aporte numeric(8,2);
        presupuesto numeric(8,2);
        dif_aporte numeric(8,2);
    BEGIN
        IF TG_OP = 'INSERT' THEN
            SELECT sum(aporte) INTO suma_aporte
            FROM gr21_patrocinios p
            WHERE p.id_evento = NEW.id_evento
            AND p.nro_edicion = NEW.nro_edicion
            GROUP BY p.id_evento, p.nro_edicion;
            SELECT ed.presupuesto INTO presupuesto
            FROM gr21_evento_edicion ed
            WHERE ed.id_evento = NEW.id_evento
            AND ed.nro_edicion = NEW.nro_edicion;
            IF (presupuesto-suma_aporte-NEW.aporte < 0) THEN
                RAISE EXCEPTION 'El aporte supera al presupuesto(pres: %, suma_aporte: %, aporte: %)', presupuesto, suma_aporte, NEW.aporte;
            END IF;
        END IF;
        IF TG_OP = 'UPDATE' THEN
            --aporte
            SELECT sum(aporte) INTO suma_aporte
            FROM gr21_patrocinios p
            WHERE p.id_evento = NEW.id_evento AND p.nro_edicion = NEW.nro_edicion
            GROUP BY p.id_evento, p.nro_edicion;

            SELECT ed.presupuesto INTO presupuesto
            FROM gr21_evento_edicion ed
            WHERE ed.id_evento = NEW.id_evento
            AND ed.nro_edicion = NEW.nro_edicion;

            dif_aporte = NEW.aporte - OLD.aporte;

            IF (presupuesto-suma_aporte-dif_aporte < 0) THEN
                RAISE EXCEPTION 'El aporte supera al presupuesto(pres: %, suma_aporte: %, diferencia nuevo aporte: %)', presupuesto, suma_aporte, dif_aporte;
            END IF;
        END IF;
        RETURN NEW;
    END $$
LANGUAGE 'plpgsql';

CREATE TRIGGER TR_GR21_presupuesto_mayor_aporte_patrocinio
BEFORE INSERT OR UPDATE OF id_evento, nro_edicion, aporte
ON gr21_patrocinios
FOR EACH ROW
EXECUTE PROCEDURE TRFN_GR21_presupuesto_mayor_aporte_patrocinio();

/* update gr21_evento_edicion
set presupuesto = 3000
where id_evento = 1 and nro_edicion = 1;  (SUPONIENDO LO ACLARADO EN EL INFORME). */

/* --------------- inciso d: Los patrocinantes solo pueden patrocinar ediciones de eventos de su mismo distrito. ----------------- */

/* CREATE ASSERTION ASS_patrocinantes_mismo_distrito_evento
CHECK (NOT EXISTS(
    SELECT 1
    FROM gr21_patrocinante pr
        JOIN gr21_patrocinios p ON (pr.id_patrocinate = p.id_patrocinate)
        JOIN gr21_evento_edicion ed ON (p.id_evento = ed.id_evento AND p.nro_edicion = ed.nro_edicion)
        JOIN gr21_evento e ON (ed.id_evento = e.id_evento)
    WHERE pr.id_distrito != e.id_distrito
)); */

create or replace function FN_GR21_ck_distrito_evento() returns trigger as
$$
    begin
        if exists (
            SELECT 1
            FROM gr21_patrocinante pr
                JOIN gr21_patrocinios p ON (pr.id_patrocinate = p.id_patrocinate)
                JOIN gr21_evento_edicion ed ON (p.id_evento = ed.id_evento AND p.nro_edicion = ed.nro_edicion)
                JOIN gr21_evento e ON (ed.id_evento = e.id_evento)
            WHERE pr.id_distrito != e.id_distrito and e.id_evento = new.id_evento
        ) then
            raise exception 'El distrito del evento no coincide con el del patrocinante';
        end if;
        return new;
    end;
$$
language 'plpgsql';

create trigger TR_GR21_evento_ck_distrito_evento
after update of id_distrito
on gr21_evento
for each row execute procedure FN_GR21_ck_distrito_evento();

create or replace function FN_GR21_ck_distrito_patrocinante() returns trigger as
$$
    begin
        if exists (
            SELECT 1
            FROM gr21_patrocinante pr
                JOIN gr21_patrocinios p ON (pr.id_patrocinate = p.id_patrocinate)
                JOIN gr21_evento_edicion ed ON (p.id_evento = ed.id_evento AND p.nro_edicion = ed.nro_edicion)
                JOIN gr21_evento e ON (ed.id_evento = e.id_evento)
            WHERE pr.id_distrito != e.id_distrito and pr.id_patrocinate = new.id_patrocinate
        ) then
            raise exception 'El distrito no coincide con el de los eventos patrocinados';
        end if;
        return new;
    end;
$$
language 'plpgsql';

create trigger TR_GR21_evento_ck_distrito_patrocinante
after update of id_distrito
on gr21_patrocinante
for each row execute procedure FN_GR21_ck_distrito_patrocinante();

create or replace function FN_GR21_ck_distrito_patrocinios() returns trigger as
$$
    declare
    begin
        if exists (
            SELECT 1
            FROM gr21_patrocinante pr
                JOIN gr21_patrocinios p ON (pr.id_patrocinate = p.id_patrocinate)
                JOIN gr21_evento_edicion ed ON (p.id_evento = ed.id_evento AND p.nro_edicion = ed.nro_edicion)
                JOIN gr21_evento e ON (ed.id_evento = e.id_evento)
            WHERE pr.id_distrito != e.id_distrito
                and pr.id_patrocinate = new.id_patrocinate and e.id_evento = new.id_evento and ed.nro_edicion = new.nro_edicion
        ) then
            raise exception 'El distrito del evento no coincide con el del patrocinante';
        end if;
        return new;
    end;
$$
language 'plpgsql';

create trigger TR_GR21_evento_ck_distrito_patrocinios
after insert or update of id_patrocinate, id_evento, nro_edicion
on gr21_patrocinios
for each row execute procedure FN_GR21_ck_distrito_patrocinios();

/* insert into gr21_patrocinios (id_patrocinate, id_evento, nro_edicion, aporte) values (1, 9, 2, 3)
(Suponiendo que el evento con id_evento = 1 tenga id_distrito = 2). */

--------------------------------------------------------  C) SERVICIOS ------------------------------------------------------------------------

/* inciso a: Cuando se crea un evento debe crear las ediciones de ese evento, colocando como
   fecha inicial el 1 del mes en el cual se creó el evento y como presupuesto, el mismo del
   año pasado más un 10 %. En caso de que no hubiera uno el año pasado, colocar 100000. */
create or replace function FN_GR21_crear_edicion_evento() returns trigger as
$$
    declare
        ultimaEdicionEvento int;
        nroEdicion int;
        fechaInicioPublicacion date;
        presupuestoAnioPasado numeric(8,2);
        presupuestoActual numeric(8,2);
    begin
        if tg_table_name = 'gr21_evento' then
             -- Se busca el presupuesto del año pasado asociado al evento. Si no existe se asigna 100000.
            select presupuesto into presupuestoAnioPasado
            from gr21_evento
                join gr21_evento_edicion on gr21_evento.id_evento = gr21_evento_edicion.id_evento
            where extract(year from fecha_inicio_pub) = extract(year from fechaInicioPublicacion) - 1;

            if presupuestoAnioPasado is null then
                presupuestoActual = 100000;
            else
                presupuestoActual = presupuestoAnioPasado + 10 * presupuestoAnioPasado / 100; -- presupuestoAnioPasado + 10%
            end if;

            -- Se determina cuál es el número de la última edición asociado al evento que se quiere agregar.
            select max(nro_edicion) into ultimaEdicionEvento
            from gr21_evento_edicion
            where id_evento = new.id_evento;

            /* Si 'ultimaEdicionEvento' es null entonces todavía no existe ninguna edición
            de ese evento. Por lo tanto el evento que se quiere agregar va a ser el primero. */
            if ultimaEdicionEvento is null then
                nroEdicion = 1;
            else
                nroEdicion = ultimaEdicionEvento + 1;
            end if;

            -- Se determina la fecha inicial de la publicación, de manera que empiece el primer día del mes del evento.
            fechaInicioPublicacion = date(concat(extract(year from current_date), '-', new.mes_evento, '-', 1));

            -- Se agrega la edición del evento a la tabla 'gr21_evento_edicion'.
            insert into gr21_evento_edicion (id_evento, nro_edicion, fecha_inicio_pub, fecha_fin_pub, presupuesto, fecha_edicion)
            values (new.id_evento, nroEdicion, fechaInicioPublicacion, null, presupuestoActual, date(concat(extract(year from current_date), '-', new.mes_evento, '-', new.dia_evento)));

            -- Si el atributo repetir es true, se agrega una edición más para el año entrante.
            if new.repetir is true then
                insert into gr21_evento_edicion (id_evento, nro_edicion, fecha_inicio_pub, fecha_fin_pub, presupuesto, fecha_edicion)
                values (new.id_evento, nroEdicion+1, date(concat(extract(year from current_date)+1, '-', new.mes_evento, '-', 1)), null, presupuestoActual, date(concat(extract(year from current_date)+1, '-', new.mes_evento, '-', new.dia_evento)));
            end if;
        end if;

        if tg_table_name = 'gr21_evento_edicion' then
            declare
                cantEventosAnioPasado int;
            begin
                /* Se determina cuántas veces se llevó a cabo el evento el año anterior. Por ejemplo, si el evento
                   que se quiere agregar es del 2021, se pregunta cuántas veces existió ese evento en 2020. */
                select count(*) into cantEventosAnioPasado
                from gr21_evento_edicion g
                where g.id_evento = new.id_evento and extract(year from fecha_edicion) = extract (year from new.fecha_edicion) - 1
                group by extract (year from fecha_edicion);

                /* Si el evento se llevó a cabo el año pasado, se busca el presupuesto de la
                   última edición y se lo asigna al evento que se quiere agregar (más un 10%). */
                if cantEventosAnioPasado >= 1 then
                    select presupuesto into presupuestoAnioPasado
                    from gr21_evento_edicion g
                    where g.id_evento = new.id_evento and fecha_edicion in (
                        select max(fecha_edicion)
                        from gr21_evento_edicion g
                        where g.id_evento = new.id_evento and extract(year from fecha_edicion) = extract(year from new.fecha_edicion) - 1
                    );

                    new.presupuesto = presupuestoAnioPasado + 10 * presupuestoAnioPasado / 100;
                else
                    -- Si no, se determina un presupuesto de 100000.
                    new.presupuesto = 100000;
                end if;
            end;
        end if;

        return new;
    end;
$$
language 'plpgsql';

create trigger TR_GR21_evento_checkEvento
after insert
on gr21_evento
for each row execute procedure FN_GR21_crear_edicion_evento();

create trigger TR_GR21_evento_edicion_checkEvento
before insert
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

create trigger TR_GR21_evento_sync_fechas
after update of dia_evento, mes_evento
on gr21_evento
for each row execute procedure FN_GR21_sync_fechas();

/* Se considera que el atributo 'fecha_edicion' de la tabla 'evento_edicion' no puede ser nulo,
   ya que toda edición de un evento particular debiera tener una fecha determinada. */
ALTER TABLE gr21_evento_edicion
    ALTER COLUMN fecha_edicion SET NOT NULL;

/* 'fecha_inicio_pub' tiene que tener dia = 1
   según lo solicitado en el inciso c (Servicios). */
alter table gr21_evento_edicion
add constraint check_fecha_inicio_pub
check (extract(day from fecha_inicio_pub) = 1);


------------------------------------------------------- D) VISTAS --------------------------------------------------------------------

------1) Identificador de los Eventos cuya fecha de realización de su último encuentro esté en el primer trimestre de 2020.
CREATE VIEW GR21_ultimo_evento_primer_trimestre_2020 AS
SELECT e.id_evento
FROM gr21_evento_edicion ed JOIN gr21_evento e ON ed.id_evento = e.id_evento
WHERE ed.fecha_edicion BETWEEN '2020-01-01' AND '2020-03-31'
ORDER BY ed.fecha_edicion DESC
LIMIT 1;

------2) Datos completos de los distritos indicando la cantidad de eventos en cada uno
CREATE VIEW GR21_cant_eventos_distrito AS
SELECT d.id_distrito, d.nombre_pais, d.nombre_provincia, d.nombre_distrito, count(*) as Cantidad_eventos
FROM gr21_distrito d JOIN gr21_evento e ON (d.id_distrito = e.id_distrito)
GROUP BY d.id_distrito
ORDER BY id_distrito;

-------3) Datos Categorías que poseen eventos en todas sus subcategorías.
CREATE VIEW GR21_categorias_con_eventos_subcategorias AS
SELECT c.id_categoria, c.nombre_categoria
FROM gr21_categoria c JOIN gr21_subcategoria s ON c.id_categoria = s.id_categoria
WHERE (
    SELECT count(distinct id_subcategoria)
    FROM gr21_evento e
    WHERE e.id_categoria = s.id_categoria
    GROUP BY id_categoria
    ) = (
        SELECT count(*)
        FROM gr21_subcategoria s
        WHERE s.id_categoria = c.id_categoria
        GROUP BY c.id_categoria
    )
GROUP BY c.id_categoria
ORDER BY c.id_categoria;