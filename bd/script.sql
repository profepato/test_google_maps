CREATE DATABASE bd_lugares;

USE bd_lugares;

CREATE TABLE lugar(
    id INT AUTO_INCREMENT,
    latitud FLOAT,
    longitud FLOAT,
    titulo VARCHAR(100),
    info VARCHAR(100),
    PRIMARY KEY(id)
);

SELECT * FROM lugar;