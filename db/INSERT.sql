INSERT INTO GR21_PAIS(nombre_pais)
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
       (4, 1, 2, 60000);
