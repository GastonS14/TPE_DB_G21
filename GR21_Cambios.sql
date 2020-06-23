--B-----------------RESTRICCIONES-----------------
--DECLARATIVOS
--A-Se debe consistir que la fecha de inicio de la publicación de la edición sea
-- anterior a la fecha de fin de la publicación del mismo si esta última no es nula.
ALTER TABLE g21_evento_edicion
ADD CONSTRAINT control_date
CHECK (fecha_fin_pub IS NULL OR fecha_inicio_pub < fecha_fin_pub);
--B-Cada categoría no debe superar las 50 subcategorías.
ALTER TABLE g21_subcategoria
ADD CONSTRAINT max_subcategorias
CHECK (NOT EXISTS(
    SELECT 1
    FROM g21_subcategoria
    GROUP BY id_categoria
    HAVING count(distinct id_subcategoria) > 50
    ));
--TRIGGER & FUNCTION
--C-La suma de los aportes que recibe una edición de un evento de sus patrocinantes
--  no puede superar el presupuesto establecido para la misma.
CREATE ASSERTION ASS_max_presupuesto
CHECK (NOT EXISTS(
    SELECT 1
    FROM g21_evento_edicion ed
    JOIN g21_patrocinios p
    ON (ed.id_evento = p.id_evento AND ed.nro_edicion = p.nro_edicion)
    GROUP BY ed.id_evento, ed.nro_edicion, ed.presupuesto
    HAVING sum(p.aporte) > ed.presupuesto
));
--TRIGGER & FUNCTION
--D-Los patrocinantes solo pueden patrocinar ediciones de eventos de su mismo distrito
CREATE ASSERTION ASS_patrocinantes_mismo_distrito_evento
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
));
--TRIGGER & FUNCTION
--C-----------------SERVICIOS-----------------
--Se debe mantener sincronizados los siguientes aspectos:
--1-Cuando se crea un evento, debe crear las ediciones de ese evento,
        -- colocando como fecha inicial el 1 del mes en el cual se creó el evento
        -- y como presupuesto, el mismo del año pasado más un 10 %,
        -- en caso de que no hubiera uno el año pasado, colocar 100.000
--2-Todas las fechas, entre EVENTO y EVENTO_EDICION (recordar en EVENTO_EDICIO también) tienen que ser coherentes.
--D-----------------VISTAS-----------------
--A-Identificador de los Eventos cuya fecha de realización de su último encuentro esté en el primer trimestre de 2020.
--CREATE VIEW
CREATE VIEW G21_ultimo_evento_pimer_trimestre_2020 AS
SELECT id_evento
FROM g21_evento_edicion
WHERE fecha_edicion
BETWEEN '2020-01-01'
AND '2020-03-31'
ORDER BY fecha_edicion DESC
LIMIT 1
WITH LOCAL CHECK OPTION;--No permita insert/update en la vista sin que el usuario se dé cuenta
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

