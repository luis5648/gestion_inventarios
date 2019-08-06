drop database inventario_ucta_t;

create database inventario_ucta_t;
	use inventario_ucta_t;

	create table categoria(
			ID_Categoria INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			Nombre_Categoria VARCHAR(45)

		);

	CREATE TABLE propietario(
			ID_Propietario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			Nombre_Propietario VARCHAR(45),
			Telefono DOUBLE,
			Aula VARCHAR(20)
		);


	CREATE TABLE usuarios(
			ID_Usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			nombre_Usuario VARCHAR(45),
			Pass VARCHAR(32),
			Administrador VARCHAR(45)

		);

	CREATE TABLE equipos(
			ID_Equipo INT PRIMARY KEY NOT NULL,
			Descripcion VARCHAR(45),
			Modelo VARCHAR(45),
			N_serie VARCHAR(45),
			Ubicacion VARCHAR(45),
			Marca VARCHAR(45),
			ID_Categoria INT NOT NULL,
			ID_Propietario INT NOT NULL,
			ID_Usuario INT NOT NULL,

			FOREIGN KEY (ID_Categoria) REFERENCES categoria (ID_Categoria) ON DELETE cascade on update cascade,
			FOREIGN KEY (ID_Propietario) REFERENCES propietario(ID_Propietario)ON DELETE cascade on update cascade,
			FOREIGN KEY (ID_Usuario) REFERENCES usuarios(ID_Usuario) ON DELETE cascade on update cascade

		);


	-- tablas de respaldos

	CREATE TABLE modEquiposRes(
			ID_REPORTE INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			ANTERIOR_ID_EQUIPO INT NOT NULL,
			ANTERIOR_DESCRIPCION VARCHAR(45),
			ANTERIOR_MODELO VARCHAR(45),
			ANTERIOR_N_SERIE VARCHAR(45),
			ANTERIOR_UBICACION VARCHAR(45),
			ANTERIOR_MARCA VARCHAR(45),
			ANTERIOR_ID_CATEGORIA  VARCHAR(45),
			ANTERIOR_ID_PROPIETARIO VARCHAR(45),

			NUEVO_ID_EQUIPO INT NOT NULL,
			NUEVO_DESCRIPCION VARCHAR(45),
			NUEVO_MODELO VARCHAR(45),
			NUEVO_N_SERIE VARCHAR(45),
			NUEVO_UBICACION VARCHAR(45),
			NUEVO_MARCA VARCHAR(45),
			NUEVO_ID_CATEGORIA VARCHAR(45),
			NUEVO_ID_PROPIETARIO VARCHAR(45),
			USUARIO_QUE_MODIFICA VARCHAR(45),
			FECHA DATETIME
		);


	CREATE TABLE insrtEquiposRes(
		ID_REPORTE INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		ID_EQUIPO INT NOT NULL,
		DESCRIPCION VARCHAR(45),
		MODELO VARCHAR(45),
		N_SERIE VARCHAR(45),
		UBICACION VARCHAR(45),
		MARCA VARCHAR(45),
		ID_CATEGORIA VARCHAR(45),
		ID_PROPIETARIO VARCHAR(45),
		USUARIO_QUE_INSERTA VARCHAR(45),
		FECHA DATETIME



	);


	CREATE TABLE delEquiposRes(
		ID_REPORTE INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		ID_EQUIPO INT NOT NULL,
		DESCRIPCION TEXT,
		USUARIO_QUE_ELIMINA INT NOT NULL,
		FECHA DATETIME
	);

-- inserts:

INSERT INTO categoria (Nombre_Categoria) VALUES ('COMPUTO');
INSERT INTO categoria (Nombre_Categoria) VALUES ('TELEFONIA');
INSERT INTO categoria (Nombre_Categoria) VALUES ('REDES');
INSERT INTO categoria (Nombre_Categoria) VALUES ('SERVIDORES');
INSERT INTO categoria (Nombre_Categoria) VALUES ('CABLEADO ESTRUCTURADO');


INSERT INTO propietario (Nombre_Propietario, Telefono, Aula) VALUES ('name1', 3331747548, 'C301');
INSERT INTO propietario (Nombre_Propietario, Telefono, Aula) VALUES ('Luis Román', 2211435578, 'biblioteca');

INSERT INTO usuarios (nombre_Usuario, Pass, Administrador) VALUES ('UCTA', 'prueba', 'ADMINISTRADOR');

INSERT INTO equipos (ID_Equipo,Descripcion, Modelo, N_serie, Ubicacion, Marca, ID_Categoria, ID_Propietario, ID_Usuario) VALUES (11234,'Modem MS', 'ME540', '121', 'C108', 'MS', 3, 2, 1);
INSERT INTO equipos (ID_Equipo,Descripcion, Modelo, N_serie, Ubicacion, Marca, ID_Categoria, ID_Propietario, ID_Usuario) VALUES (32334,'HUB TP-LINK', '23234', '121', 'CTA', '234234', 1, 1, 1);
INSERT INTO equipos (ID_Equipo,Descripcion, Modelo, N_serie, Ubicacion, Marca, ID_Categoria, ID_Propietario, ID_Usuario) VALUES (55542,'Laptop Toshiba', 'Satelite c200', '10000', 'C108', 'Toshiba', 1, 2, 1);







-- triggers:

CREATE TRIGGER equiposAD AFTER DELETE ON equipos FOR EACH ROW
	INSERT INTO delEquiposRes(ID_EQUIPO,DESCRIPCION,USUARIO_QUE_ELIMINA,FECHA)
	VALUES (OLD.ID_Equipo,OLD.Descripcion,OLD.ID_Usuario, NOW());


CREATE TRIGGER equiposAI AFTER INSERT ON equipos FOR EACH ROW
	INSERT INTO insrtEquiposRes(ID_EQUIPO, DESCRIPCION, MODELO, N_SERIE, UBICACION,
															MARCA, ID_CATEGORIA, ID_PROPIETARIO, USUARIO_QUE_INSERTA, FECHA)
	VALUES (NEW.ID_Equipo,NEW.Descripcion,NEW.Modelo, NEW.N_serie, NEW.Ubicacion,NEW.Marca,
					(SELECT Nombre_Categoria from categoria where ID_Categoria = NEW.ID_Categoria),(SELECT Nombre_Propietario
					from propietario where ID_Propietario =  NEW
					  .ID_Propietario),(SELECT nombre_Usuario FROM usuarios WHERE ID_Usuario = NEW
					  .ID_Usuario),NOW());


CREATE TRIGGER equiposBU BEFORE UPDATE ON equipos FOR EACH ROW
	INSERT INTO modEquiposRes(ANTERIOR_ID_EQUIPO, ANTERIOR_DESCRIPCION, ANTERIOR_MODELO, ANTERIOR_N_SERIE, ANTERIOR_UBICACION, ANTERIOR_MARCA,
														ANTERIOR_ID_CATEGORIA, ANTERIOR_ID_PROPIETARIO,
														NUEVO_ID_EQUIPO, NUEVO_DESCRIPCION, NUEVO_MODELO, NUEVO_N_SERIE, NUEVO_UBICACION,
															NUEVO_MARCA, NUEVO_ID_CATEGORIA, NUEVO_ID_PROPIETARIO, USUARIO_QUE_MODIFICA, FECHA)
	VALUES (OLD.ID_Equipo,OLD.Descripcion,OLD.Modelo, OLD.N_serie, OLD.Ubicacion,OLD.Marca,(SELECT Nombre_Categoria
	from categoria where ID_Categoria = OLD.ID_Categoria),
					(SELECT Nombre_Propietario from propietario where ID_Propietario = OLD.ID_Propietario),NEW.ID_Equipo,NEW
					  .Descripcion,NEW.Modelo, NEW.N_serie, NEW.Ubicacion,NEW.Marca,(SELECT Nombre_Categoria FROM categoria
					  where ID_Categoria = NEW.ID_Categoria),(SELECT Nombre_Propietario FROM propietario WHERE ID_Propietario =
					                                                                                           NEW
					                                                                                             .ID_Propietario),
					(SELECT nombre_Usuario FROM usuarios WHERE ID_Usuario = NEW
					  .ID_Usuario),NOW());

