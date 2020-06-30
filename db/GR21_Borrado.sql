drop table gr21_patrocinios cascade;

drop table gr21_evento_edicion cascade;

drop table gr21_evento cascade;

drop table gr21_patrocinante cascade;

drop table gr21_distrito cascade;

drop table gr21_provincia cascade;

drop table gr21_pais cascade;

drop table gr21_subcategoria cascade;

drop table gr21_categoria cascade;

drop table gr21_usuario cascade;

drop function trfn_gr21_maximo_subcategorias() cascade;

drop function trfn_gr21_presupuesto_mayor_aporte_ed() cascade;

drop function trfn_gr21_presupuesto_mayor_aporte_patrocinio() cascade;

drop function fn_gr21_ck_distrito_evento() cascade;

drop function fn_gr21_ck_distrito_patrocinante() cascade;

drop function fn_gr21_ck_distrito_patrocinios() cascade;

drop function fn_gr21_crear_edicion_evento() cascade;

drop function fn_gr21_sync_fechas() cascade;



