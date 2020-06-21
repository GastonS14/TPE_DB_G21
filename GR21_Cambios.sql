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
--C-La suma de los aportes que recibe una edición de un evento de sus patrocinantes
--  no puede superar el presupuesto establecido para la misma.
CREATE ASSERTION ASS_max_presupuesto
CHECK (NOT EXISTS(
    SELECT 1
    FROM g21_evento_edicion ed
    JOIN g21_patrocinios p
    ON (ed.id_evento = p.id_evento AND ed.nro_edicion = p.nro_edicion)
    GROUP BY ed.id_evento, ed.nro_edicion, ed.presupuesto
    HAVING sum(p.aporte) < ed.presupuesto
));
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