--DECLARATIVOS
--A
ALTER TABLE g21_evento_edicion
DROP CONSTRAINT control_date CASCADE;
--B
ALTER TABLE g21_subcategoria
DROP CONSTRAINT max_subcategorias CASCADE;
--C
DROP ASSERTION ASS_max_presupuesto CASCADE;
--D
DROP ASSERTION ASS_patrocinantes_mismo_distrito_evento CASCADE;
