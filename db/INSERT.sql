INSERT INTO G21_PERMISOS(id_permiso, nombre_permiso)
VALUES
       (1, 'Administrador'),
       (2, 'Registrado'),
       (3, 'Invitado');

INSERT INTO G21_PAIS(nombre_pais)
VALUES
       ('uruguay'),
       ('brasil'),
       ('argentina');

INSERT INTO G21_PROVINCIA(nombre_pais, nombre_provincia)
VALUES
       ('uruguay', 'durazno'),
       ('argentina', 'buenos aires'),
       ('argentina', 'tierra del fuego');

INSERT INTO G21_DISTRITO(id_distrito, nombre_pais, nombre_provincia, nombre_distrito)
VALUES
       (1, 'uruguay', 'durazno', 'distr1'),
       (2, 'uruguay', 'durazno', 'distr2'),
       (3, 'argentina', 'buenos aires', 'distr1'),
       (4, 'argentina', 'tierra del fuego', 'distr2'),
       (5, 'argentina', 'tierra del fuego', 'distr3');

INSERT INTO G21_SUBCATEGORIA(id_categoria, id_subcategoria, nombre_subcategoria)
VALUES
       (1, 1, 'subcat1'),
       (1, 2, 'subcat2'),
       (1, 3, 'subcat3'),
       (2, 1, 'subcat1');
