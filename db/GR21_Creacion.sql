-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-06-12 16:30:46.933

-- tables
-- Table: CATEGORIA
CREATE TABLE G21_CATEGORIA (
    id_categoria int  NOT NULL,
    nombre_categoria varchar(150)  NOT NULL,
    CONSTRAINT PK_G21_CATEGORIA PRIMARY KEY (id_categoria)
);

-- Table: DISTRITO
CREATE TABLE G21_DISTRITO (
    id_distrito int  NOT NULL,
    nombre_pais varchar(120)  NOT NULL,
    nombre_provincia varchar(120)  NOT NULL,
    nombre_distrito varchar(120)  NOT NULL,
    CONSTRAINT PK_G21_DISTRITO PRIMARY KEY (id_distrito)
);

-- Table: EVENTO
CREATE TABLE G21_EVENTO (
    id_evento int  NOT NULL,
    nombre_evento varchar(250)  NOT NULL,
    descripcion_evento text  NOT NULL,
    id_categoria int  NOT NULL,
    id_subcategoria int  NOT NULL,
    id_usuario int  NOT NULL,
    id_distrito int  NULL,
    dia_evento int  NOT NULL,
    mes_evento int  NOT NULL,
    repetir boolean  NOT NULL,
    CONSTRAINT PK_G21_EVENTO PRIMARY KEY (id_evento)
);

-- Table: EVENTO_EDICION
CREATE TABLE G21_EVENTO_EDICION (
    id_evento int  NOT NULL,
    nro_edicion int  NOT NULL,
    fecha_inicio_pub date  NOT NULL,
    fecha_fin_pub date  NULL,
    presupuesto numeric(8,2)  NOT NULL,
    fecha_edicion date  NULL,
    CONSTRAINT PK_G21_EVENTO_EDICION PRIMARY KEY (id_evento,nro_edicion)
);

-- Table: PAIS
CREATE TABLE G21_PAIS (
    nombre_pais varchar(120)  NOT NULL,
    CONSTRAINT PK_G21_PAIS PRIMARY KEY (nombre_pais)
);

-- Table: PATROCINANTE
CREATE TABLE G21_PATROCINANTE (
    id_patrocinate int  NOT NULL,
    razon_social varchar(60)  NOT NULL,
    nombre_responsable varchar(60)  NOT NULL,
    apellido_responsable varchar(60)  NOT NULL,
    direccion varchar(200)  NULL,
    id_distrito int  NOT NULL,
    CONSTRAINT PK_G21_PATROCINANTE PRIMARY KEY (id_patrocinate)
);

-- Table: PATROCINIOS
CREATE TABLE G21_PATROCINIOS (
    id_patrocinate int  NOT NULL,
    id_evento int  NOT NULL,
    nro_edicion int  NOT NULL,
    aporte numeric(8,2)  NOT NULL,
    CONSTRAINT PK_G21_PATROCINIOS PRIMARY KEY (id_patrocinate,id_evento,nro_edicion)
);

-- Table: PROVINCIA
CREATE TABLE G21_PROVINCIA (
    nombre_pais varchar(120)  NOT NULL,
    nombre_provincia varchar(120)  NOT NULL,
    CONSTRAINT PK_G21_PROVINCIA PRIMARY KEY (nombre_pais,nombre_provincia)
);

-- Table: SUBCATEGORIA
CREATE TABLE G21_SUBCATEGORIA (
    id_categoria int  NOT NULL,
    id_subcategoria int  NOT NULL,
    nombre_subcategoria varchar(150) NOT NULL,
    CONSTRAINT PK_G21_SUBCATEGORIA PRIMARY KEY (id_categoria,id_subcategoria)
);

-- Table: USUARIO
CREATE TABLE G21_USUARIO (
    id_usuario int  NOT NULL,
    nombre varchar(40)  NOT NULL,
    apellido varchar(40)  NOT NULL,
    e_mail varchar(320)  NOT NULL,
    password varchar(255)  NOT NULL,
    CONSTRAINT PK_G21_USUARIO PRIMARY KEY (id_usuario)
);

-- foreign keys
-- Reference: FK_DISTRITO_PROVINCIA (table: DISTRITO)
ALTER TABLE G21_DISTRITO ADD CONSTRAINT FK_G21_DISTRITO_PROVINCIA
    FOREIGN KEY (nombre_pais, nombre_provincia)
    REFERENCES G21_PROVINCIA (nombre_pais, nombre_provincia)
    NOT DEFERRABLE
    INITIALLY IMMEDIATE
;

-- Reference: FK_EVENTO_DISTRITO (table: EVENTO)
ALTER TABLE G21_EVENTO ADD CONSTRAINT FK_G21_EVENTO_DISTRITO
    FOREIGN KEY (id_distrito)
    REFERENCES G21_DISTRITO (id_distrito)
    NOT DEFERRABLE
    INITIALLY IMMEDIATE
;

-- Reference: FK_EVENTO_EDICION_EVENTO (table: EVENTO_EDICION)
ALTER TABLE G21_EVENTO_EDICION ADD CONSTRAINT FK_G21_EVENTO_EDICION_EVENTO
    FOREIGN KEY (id_evento)
    REFERENCES G21_EVENTO (id_evento)
    NOT DEFERRABLE
    INITIALLY IMMEDIATE
;

-- Reference: FK_EVENTO_SUBCATEGORIA (table: EVENTO)
ALTER TABLE G21_EVENTO ADD CONSTRAINT FK_G21_EVENTO_SUBCATEGORIA
    FOREIGN KEY (id_categoria, id_subcategoria)
    REFERENCES G21_SUBCATEGORIA (id_categoria, id_subcategoria)
    NOT DEFERRABLE
    INITIALLY IMMEDIATE
;

-- Reference: FK_EVENTO_USUARIO (table: EVENTO)
ALTER TABLE G21_EVENTO ADD CONSTRAINT FK_G21_EVENTO_USUARIO
    FOREIGN KEY (id_usuario)
    REFERENCES G21_USUARIO (id_usuario)
    NOT DEFERRABLE
    INITIALLY IMMEDIATE
;

-- Reference: FK_PATROCIONIOS_EVENTO_EDICION (table: PATROCINIOS)
ALTER TABLE G21_PATROCINIOS ADD CONSTRAINT FK_G21_PATROCIONIOS_EVENTO_EDICION
    FOREIGN KEY (id_evento, nro_edicion)
    REFERENCES G21_EVENTO_EDICION (id_evento, nro_edicion)
    NOT DEFERRABLE
    INITIALLY IMMEDIATE
;

-- Reference: FK_PATROCIONIOS_PATROCINANTE (table: PATROCINIOS)
ALTER TABLE G21_PATROCINIOS ADD CONSTRAINT FK_G21_PATROCIONIOS_PATROCINANTE
    FOREIGN KEY (id_patrocinate)
    REFERENCES G21_PATROCINANTE (id_patrocinate)
    NOT DEFERRABLE
    INITIALLY IMMEDIATE
;

-- Reference: FK_PROVINCIA_PAIS (table: PROVINCIA)
ALTER TABLE G21_PROVINCIA ADD CONSTRAINT FK_G21_PROVINCIA_PAIS
    FOREIGN KEY (nombre_pais)
    REFERENCES G21_PAIS (nombre_pais)
    NOT DEFERRABLE
    INITIALLY IMMEDIATE
;

-- Reference: FK_SUBCATEGORIA_CATEGORIA (table: SUBCATEGORIA)
ALTER TABLE G21_SUBCATEGORIA ADD CONSTRAINT FK_G21_SUBCATEGORIA_CATEGORIA
    FOREIGN KEY (id_categoria)
    REFERENCES G21_CATEGORIA (id_categoria)
    NOT DEFERRABLE
    INITIALLY IMMEDIATE
;

-- Reference: PATROCINANTE_DISTRITO (table: PATROCINANTE)
ALTER TABLE G21_PATROCINANTE ADD CONSTRAINT FK_G21_PATROCINANTE_DISTRITO
    FOREIGN KEY (id_distrito)
    REFERENCES G21_DISTRITO (id_distrito)
    NOT DEFERRABLE
    INITIALLY IMMEDIATE
;

-- End of file.
