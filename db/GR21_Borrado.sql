--DECLARATIVOS
--A
ALTER TABLE G21_evento_edicion
DROP CONSTRAINT control_date CASCADE;
--B
--ALTER TABLE G21_subcategoria DROP CONSTRAINT max_subcategorias CASCADE;
DROP FUNCTION TRFN_GR21_maximo_subcategorias() CASCADE;
--C
--DROP ASSERTION ASS_max_presupuesto CASCADE;
DROP FUNCTION TRFN_GR21_presupuesto_mayor_aporte_patrocinio() CASCADE;
--D
DROP ASSERTION ASS_patrocinantes_mismo_distrito_evento CASCADE;
