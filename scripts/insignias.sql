DROP TABLE IF EXISTS participantes;
DROP TABLE IF EXISTS cursos;
DROP TABLE IF EXISTS carreras;
DROP TABLE IF EXISTS usuarios;

-- usuarios
-- usuario_id
-- usuario_nombre
-- usuario_pass
-- usuario_correo
-- usuario_activo
-- usuario_area
-- usuario_tipo
CREATE TABLE usuarios (
    usuario_id      INT GENERATED ALWAYS AS IDENTITY,
    usuario_nombre  VARCHAR (200) NOT NULL,
    usuario_pass    VARCHAR (100) NOT NULL,
    usuario_correo  VARCHAR (200) UNIQUE NOT NULL,
    usuario_activo  BOOLEAN NOT NULL DEFAULT FALSE,
    usuario_area    VARCHAR (200) NOT NULL,
    usuario_tipo    VARCHAR (50) NOT NULL DEFAULT 'user',
    PRIMARY KEY(usuario_id)
);

-- carrera
-- carrera_id
-- carrera_nombre
-- carrera_descripcion
-- carrera_img
-- carrera_insignia
CREATE TABLE carreras (
    carrera_id          INT GENERATED ALWAYS AS IDENTITY,
    carrera_nombre      VARCHAR (200) UNIQUE NOT NULL,
    carrera_descripcion VARCHAR (500) NOT NULL,
    carrera_img         VARCHAR (300) NOT NULL,
    carrera_insignia    VARCHAR (300) NOT NULL,
    PRIMARY KEY(carrera_id)
);

-- cursos
-- curso_id
-- usuario_id
-- carrera_id
-- curso_nombre
-- curso_descripcion
-- curso_insignia
-- curso_datec
CREATE TABLE cursos (
    curso_id            INT GENERATED ALWAYS AS IDENTITY,
    usuario_id          INT NOT NULL,
    carrera_id          INT NOT NULL,
    curso_nombre        VARCHAR (200) NOT NULL,
    curso_descripcion   VARCHAR (500) NOT NULL,
    curso_insignia      VARCHAR (300) NOT NULL,
    curso_datec         TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(curso_id),
      CONSTRAINT fk_cursos_usuarios
        FOREIGN KEY(usuario_id) 
          REFERENCES usuarios(usuario_id),
      CONSTRAINT fk_cursos_carrera
        FOREIGN KEY(carrera_id) 
          REFERENCES carreras(carrera_id)
);

-- participantes
-- participante_id
-- usuario_id
-- curso_id
-- participante_terminado
CREATE TABLE participantes (
    participante_id         INT GENERATED ALWAYS AS IDENTITY,
    usuario_id              INT NOT NULL,
    curso_id                INT NOT NULL,
    participante_terminado  BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY(participante_id),
      CONSTRAINT fk_participantes_usuarios
        FOREIGN KEY(usuario_id) 
          REFERENCES usuarios(usuario_id),
      CONSTRAINT fk_participantes_cursos
        FOREIGN KEY(curso_id) 
          REFERENCES cursos(curso_id)
);