CREATE TABLE categorias (
    id INT AUTO_INCREMENT,
    nombre VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE tags (
    id INT AUTO_INCREMENT,
    nombre VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE entradasblog (
    id INT AUTO_INCREMENT,
    titulo VARCHAR(255),
    contenido TEXT,
    fechapublicacion DATE,
    categoriaid INT,
    PRIMARY KEY (id),
    FOREIGN KEY (categoriaid) REFERENCES categorias(id)
);

CREATE TABLE entradastags (
    entradaid INT,
    tagid INT,
    PRIMARY KEY (entradaid, tagid),
    FOREIGN KEY (entradaid) REFERENCES entradasblog(id),
    FOREIGN KEY (tagid) REFERENCES tags(id)
);

INSERT INTO categorias (nombre) VALUES ('NombreCategoría');
INSERT INTO entradasblog (titulo, contenido, fechapublicacion, categoriaid) 
VALUES ('TituloEntrada', 'Contenido de la entrada', '2023-11-22', 1);
INSERT INTO tags (nombre) VALUES ('Tag1'), ('Tag2'), ('Tag3'), ('Tag4'), ('Tag5');
INSERT INTO entradastags (entradaid, tagid) VALUES (1, 1), (1, 2);
