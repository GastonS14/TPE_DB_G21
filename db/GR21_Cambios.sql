/*INSERT INTO GR21_PAIS(nombre_pais)
VALUES
       ('uruguay'),
       ('brasil'),
       ('argentina');

INSERT INTO GR21_USUARIO(id_usuario, nombre, apellido, e_mail, password)
VALUES
       (1, 'gas', 'a', 'e@a', 1),
       (2, 'ped', 'b', 'ped@a', 1),
       (3, 'jor', 'c', 'jor@a', 1),
       (4, 'mar', 'd', 'mar@a', 1),
       (5, 'eli', 'e', 'eli@a', 1);

INSERT INTO GR21_CATEGORIA(id_categoria, nombre_categoria)
VALUES
       (1, 'cat1'),
       (2, 'cat2'),
       (3, 'cat3'),
       (4, 'cat4');


INSERT INTO GR21_PROVINCIA(nombre_pais, nombre_provincia)
VALUES
       ('uruguay', 'durazno'),
       ('argentina', 'buenos aires'),
       ('argentina', 'tierra del fuego');

INSERT INTO GR21_SUBCATEGORIA(id_categoria, id_subcategoria, nombre_subcategoria)
VALUES
       (1, 1, 'subcat11'),
       (1, 2, 'subcat12'),
       (1, 3, 'subcat13'),
       (2, 1, 'subcat21'),
       (2, 2, 'subcat22'),
       (3, 1, 'subcat31'),
       (4, 1, 'subcat41');

INSERT INTO GR21_DISTRITO(id_distrito, nombre_pais, nombre_provincia, nombre_distrito)
VALUES
       (1, 'uruguay', 'durazno', 'distr1'),
       (2, 'uruguay', 'durazno', 'distr2'),
       (3, 'argentina', 'buenos aires', 'distr1'),
       (4, 'argentina', 'tierra del fuego', 'distr2'),
       (5, 'argentina', 'tierra del fuego', 'distr3');

INSERT INTO GR21_evento(id_evento, nombre_evento, descripcion_evento, id_categoria, id_subcategoria, id_usuario, id_distrito, dia_evento, mes_Evento, repetir)
VALUES
       (1, 'cumple', 'en un cumple', 1, 1, 1, 1, 1, 2, false),
        (2, 'basket', 'deporte', 1, 2, 1, null, 1, 2, false),
        (3, 'show', 'show de musica', 2, 1, 1, null, 1, 2, false),
        (4, 'posada', 'en la posada', 4, 1, 1, 3, 10, 2, false),
        (5, 'sky', 'doo', 4, 1, 2, 3, 4, 2, false);

INSERT INTO gr21_evento_edicion(id_evento, nro_edicion, fecha_inicio_pub, fecha_fin_pub, presupuesto, fecha_edicion)
VALUES
       (1, 1, '2018-06-04', null, 7000, '2020-01-03'),
       (1, 2, '2019-08-04', null, 107000, '2020-03-03'),
       (1, 3, '2018-06-12', null, 170000, '2019-01-03'),
       (2, 1, '2018-07-07', null, 700000, '2018-01-08'),
       (2, 2, '2016-07-04', null, 45000, '2020-01-24'),
       (3, 1, '2016-07-04', null, 450000, '2017-01-03');

INSERT INTO gr21_patrocinante(id_patrocinante, razon_social, nombre_responsable, apellido_responsable, direccion, id_distrito)
VALUES
       (1, 'pte1', 'gas', 'san', null, 1),
       (2, 'pte2', 'gaffs', 'san', null, 1),
       (3, 'pte3', 'gas', 'safn', null, 2),
       (4, 'pte4', 'gas', 'ssaan', null, 2),
       (5, 'pte5', 'gas', 'ssdsdan', null, 2),
       (6, 'pte6', 'gas', 'dsf', null, 4);

INSERT INTO gr21_patrocinios(id_patrocinante, id_evento, nro_edicion, aporte)
VALUES
       (1, 1, 1, 700),
       (2, 2, 1, 50000),
       (3, 2, 2, 1000),
       (4, 3, 1, 1000),
       (4, 2, 1, 1000),
       (4, 1, 2, 60000);*/
--FIN INSERT PRUEBAS
----------------------------------------------------------------------------------------------------

--B-----------------RESTRICCIONES-----------------
--A-
ALTER TABLE gr21_evento_edicion
ADD CONSTRAINT CK_control_date
CHECK (fecha_fin_pub IS NULL OR fecha_inicio_pub < fecha_fin_pub);
--ACTIVACION DE REGLA
--INSERT INTO gr21_evento_edicion(id_evento, nro_edicion, fecha_inicio_pub, fecha_fin_pub, presupuesto, fecha_edicion) VALUES (4, 1, '2018-06-04', '2018-06-02', 7000, '2020-01-03');
--UPDATE GR21_evento_edicion SET fecha_fin_pub = '2015-06-02' WHERE id_evento = 3;

--B-
/*ALTER TABLE g21_subcategoria
ADD CONSTRAINT max_subcategorias
CHECK (NOT EXISTS(
    SELECT 1
    FROM g21_subcategoria
    GROUP BY id_categoria
    HAVING count(id_subcategoria) > 50
    ));*/
--TRIGGER & FUNCTION
--query for set env max_subcategorias for testing
--SELECT id_categoria, count(*) AS cantidad_subcategorias FROM GR21_subcategoria GROUP BY id_categoria ORDER BY 2 DESC;
CREATE OR REPLACE FUNCTION TRFN_GR21_maximo_subcategorias() RETURNS TRIGGER AS $$
    DECLARE
        max_subcategorias int = 50;
    BEGIN
        IF exists(
            SELECT 1
            FROM gr21_subcategoria
            WHERE id_categoria = new.id_categoria
            GROUP BY id_categoria
            HAVING count(id_subcategoria) >= max_subcategorias
        ) THEN
            RAISE EXCEPTION 'Ya se alcanzó la cantidad máxima de subcategorías (%)', max_subcategorias;
        END IF ;
        RETURN new;
    END $$
LANGUAGE 'plpgsql';

CREATE TRIGGER TR_GR21_maximo_subcategorias
BEFORE INSERT OR UPDATE OF id_categoria ON gr21_subcategoria
FOR EACH ROW
EXECUTE PROCEDURE TRFN_GR21_maximo_subcategorias();

--ACTIVACION DE REGLA
--INSERT INTO GR21_SUBCATEGORIA(id_categoria, id_subcategoria, nombre_subcategoria) VALUES (1, 4, 'subcat14');
--UPDATE GR21_subcategoria SET id_categoria = 1 WHERE id_subcategoria = 3;

--C-
/*CREATE ASSERTION ASS_max_presupuesto
CHECK (NOT EXISTS(
    SELECT 1
    FROM g21_evento_edicion ed
    JOIN g21_patrocinios p
    ON (ed.id_evento = p.id_evento AND ed.nro_edicion = p.nro_edicion)
    GROUP BY ed.id_evento, ed.nro_edicion, ed.presupuesto
    HAVING sum(p.aporte) > ed.presupuesto
));*/
--TRIGGER & FUNCTION
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
            WHERE p.id_evento = NEW.id_evento
            AND p.nro_edicion = NEW.nro_edicion
            GROUP BY p.id_evento, p.nro_edicion;
            SELECT ed.presupuesto INTO presupuesto
            FROM gr21_evento_edicion ed
            WHERE ed.id_evento = NEW.id_evento
            AND ed.nro_edicion = NEW.nro_edicion;
            dif_aporte = NEW.aporte - OLD.aporte;
            IF (presupuesto-suma_aporte-dif_aporte < 0) THEN
                RAISE EXCEPTION 'El aporte supera al presupuesto(presupuesto: %, suma_aporte: %, diferencia nuevo aporte: %)', presupuesto, suma_aporte, dif_aporte;
            END IF;
        END IF;
        RETURN NEW;
    END $$
LANGUAGE 'plpgsql';

CREATE TRIGGER TR_GR21_presupuesto_mayor_aporte_patrocinio
AFTER INSERT OR UPDATE OF id_evento, nro_edicion, aporte
ON gr21_patrocinios
FOR EACH ROW
EXECUTE PROCEDURE TRFN_GR21_presupuesto_mayor_aporte_patrocinio();

--UPDATE gr21_evento_edicion SET presupuesto = 100 WHERE id_evento = 2;
--INSERT INTO gr21_patrocinios(id_patrocinante, id_evento, nro_edicion, aporte) VALUES (6, 2, 2, 50000);
--UPDATE gr21_patrocinios SET id_evento = 2 WHERE id_patrocinante = 4 AND id_evento = 1 AND nro_edicion = 2;
--UPDATE gr21_patrocinios SET nro_edicion = 2 WHERE id_patrocinante = 2 AND id_evento = 2 AND nro_edicion = 1;
--UPDATE gr21_patrocinios SET aporte = 60000 WHERE id_patrocinante = 3 AND id_evento = 2 AND nro_edicion = 2;

--D-
/*CREATE ASSERTION ASS_patrocinantes_mismo_distrito_evento
CHECK (NOT EXISTS(
   SELECT 1
    FROM g21_patrocinante pr
    JOIN g21_patrocinios p
    ON (pr.id_patrocinate = p.id_patrocinate)
    JOIN g21_evento_edicion ed
    ON (p.id_evento = ed.id_evento AND p.nro_edicion = ed.nro_edicion)
    JOIN g21_evento e
    ON (ed.id_evento = e.id_evento)
    WHERE pr.id_distrito != e.id_distrito
    OR e.id_distrito IS NULL
));*/
create or replace function FN_GR21_ck_distrito_evento() returns trigger as
$$
    begin
        if exists (
            SELECT 1
            FROM gr21_patrocinante pr
                JOIN gr21_patrocinios p ON (pr.id_patrocinante = p.id_patrocinante)
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
                JOIN gr21_patrocinios p ON (pr.id_patrocinante = p.id_patrocinante)
                JOIN gr21_evento_edicion ed ON (p.id_evento = ed.id_evento AND p.nro_edicion = ed.nro_edicion)
                JOIN gr21_evento e ON (ed.id_evento = e.id_evento)
            WHERE pr.id_distrito != e.id_distrito and pr.id_patrocinante = new.id_patrocinante
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
                JOIN gr21_patrocinios p ON (pr.id_patrocinante = p.id_patrocinante)
                JOIN gr21_evento_edicion ed ON (p.id_evento = ed.id_evento AND p.nro_edicion = ed.nro_edicion)
                JOIN gr21_evento e ON (ed.id_evento = e.id_evento)
            WHERE pr.id_distrito != e.id_distrito
                and pr.id_patrocinante = new.id_patrocinante and e.id_evento = new.id_evento and ed.nro_edicion = new.nro_edicion
        ) then
            raise exception 'El distrito del evento no coincide con el del patrocinante';
        end if;
        return new;
    end;
$$
language 'plpgsql';

create trigger TR_GR21_evento_ck_distrito_patrocinios
after insert or update of id_patrocinante, id_evento, nro_edicion
on gr21_patrocinios
for each row execute procedure FN_GR21_ck_distrito_patrocinios();

--TRIGGER & FUNCTION
--C-----------------SERVICIOS-----------------
--A-
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

--B-
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

--D-----------------VISTAS-----------------
--A-Identificador de los Eventos cuya fecha de realización de su último encuentro esté en el primer trimestre de 2020.
--CREATE VIEW
CREATE VIEW GR21_ultimos_primer_trimestre_2020 AS
SELECT ee.id_evento
FROM gr21_evento_edicion ee
WHERE ee.fecha_edicion
BETWEEN '2020-01-01'
AND '2020-03-31'
AND nro_edicion IN (
    SELECT max(nro_edicion)
    FROM gr21_evento_edicion e
    WHERE e.id_evento = ee.id_evento
)
GROUP BY id_evento;
--QUERY SELECT
--SELECT * FROM GR21_ultimo_evento_primer_trimestre_2020

--B-
CREATE VIEW GR21_cant_eventos_distrito AS
SELECT d.id_distrito, d.nombre_pais, d.nombre_provincia, d.nombre_distrito, count(*) as Cantidad_eventos
FROM gr21_distrito d
JOIN gr21_evento e
ON (d.id_distrito = e.id_distrito)
GROUP BY d.id_distrito
ORDER BY id_distrito;
--QUERY SELECT
--SELECT * FROM GR21_cant_eventos_distrito;

--C-Datos Categorías que poseen eventos en todas sus subcategorías.
CREATE VIEW GR21_categorias_con_eventos_en_toda_subcategoria AS
SELECT c.id_categoria, c.nombre_categoria
FROM gr21_categoria c
JOIN gr21_subcategoria s
ON c.id_categoria = s.id_categoria
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
--QUERY SELECT
--SELECT * FROM GR21_categorias_con_eventos_en_toda_subcategoria;

--D-----------------SITIO-----------------
--view top 10 users -> No actualizable
CREATE VIEW GR21_top_usuarios_events AS
SELECT u.id_usuario, u.nombre, u.apellido, u.e_mail, count(*) AS cant_eventos_usuario
FROM gr21_usuario u
JOIN gr21_evento e
ON u.id_usuario = e.id_usuario
GROUP BY u.id_usuario
ORDER BY 5 DESC, 1
LIMIT 10;
--QUERY SELECT
--SELECT * FROM GR21_top_usuarios_events

--Listado de usuarios que contenga todos los datos del usuario junto con la cantidad de eventos publicados
CREATE VIEW GR_21_user_list_filter AS
SELECT u.id_usuario,
       u.nombre,
       u.apellido,
       u.password,
       u.e_mail,
       (SELECT count(*) FROM gr21_evento e WHERE e.id_usuario = u.id_usuario) as cantidad_eventos
FROM gr21_usuario u;