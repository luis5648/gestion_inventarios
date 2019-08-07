drop database recepcion;


create database recepcion;
use recepcion;

create table EQUIPOS(
    ID_EQUIPO INT PRIMARY KEY NOT NULL AUTO_INCREMENT
    FECHA DATE,
    PROCEDENCIA TEXT,
    PERSONA_ENTREGA TEXT

);