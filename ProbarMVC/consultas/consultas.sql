//Crear tabla recomendaciones
CREATE TABLE recomendaciones(
	idRecomendacion smallint UNSIGNED AUTO_INCREMENT ,
    nombre varchar(150) not null,
    PRIMARY KEY(idRecomendacion)
);

//Crear tabla animales
CREATE TABLE animales(
	idAnimales smallint UNSIGNED AUTO_INCREMENT,
    nombreAnimal varchar(150) not null,
    CONSTRAINT pk_Animales PRIMARY key (idAnimales)
);
//Crear tabla boletin_Usuario
CREATE TABLE boletin_Usuario (
    idUsuario smallint UNSIGNED AUTO_INCREMENT,
    nombreUsuario VARCHAR(255) not null,
    correo VARCHAR(255) not null unique,
    idioma VARCHAR(50) not null,
    idRecomendacion smallint UNSIGNED not null,
    CONSTRAINT pk_boletinUsuario PRIMARY KEY (idUsuario),
    CONSTRAINT fk_idReco_Boletin FOREIGN KEY (idRecomendacion) REFERENCES recomendaciones(idRecomendacion)
);

//Crear boletin_Animales tabla que sale de M:N de las entidades animales y boletin_usuario
CREATE TABLE boletin_Animales(
    idUsuario smallint UNSIGNED,
    idAnimales smallint UNSIGNED,
    CONSTRAINT pk_conjunta_boletinAnimal PRIMARY KEY (idUsuario,idAnimales),
    CONSTRAINT fk_usuario FOREIGN KEY (idUsuario) REFERENCES boletin_usuario(idUsuario),
    CONSTRAINT fk_animal FOREIGN KEY (idAnimales) REFERENCES animales(idAnimales)
);
//Meter recomendaciones
INSERT INTO recomendaciones (nombre) VALUES ('Me lo recomendó Google'),
('Anuncio'),
('Me lo recomendó un amigo'),
('Otros...');

//meter un idUsuario
insert into boletin_usuario (nombreUsuario,correo,idioma,idRecomendacion) values("Javi","javi@gmail.com","ingles",1);

//meter animales
INSERT INTO animales (nombreAnimal) VALUES ('Koala'),
('Oso Polar'),
('Elefante Asiatico');

//Añadir un campo que permita NU ll 
ALTER TABLE boletin_usuario
	ADD COLUMN sugerencias VARCHAR(150) NULL;

// Eliminar la restricción actual
ALTER TABLE boletin_Usuario
DROP FOREIGN KEY fk_idReco_Boletin;

// Añadir la restricción con CASCADE
ALTER TABLE boletin_Usuario
ADD CONSTRAINT fk_idReco_Boletin 
FOREIGN KEY (idRecomendacion) 
REFERENCES recomendaciones(idRecomendacion) 
ON DELETE CASCADE 
ON UPDATE CASCADE;

// Eliminar la restricción fk_usuario
ALTER TABLE boletin_Animales
DROP FOREIGN KEY fk_usuario;

// Eliminar la restricción fk_animal
ALTER TABLE boletin_Animales
DROP FOREIGN KEY fk_animal;

// Añadir la restricción fk_usuario con CASCADE
ALTER TABLE boletin_Animales
ADD CONSTRAINT fk_usuario 
FOREIGN KEY (idUsuario) 
REFERENCES boletin_usuario(idUsuario) 
ON DELETE CASCADE 
ON UPDATE CASCADE;

// Añadir la restricción fk_animal con CASCADE
ALTER TABLE boletin_Animales
ADD CONSTRAINT fk_animal 
FOREIGN KEY (idAnimales) 
REFERENCES animales(idAnimales) 
ON DELETE CASCADE 
ON UPDATE CASCADE;