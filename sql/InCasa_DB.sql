CREATE DATABASE InCasa
	DEFAULT	CHARACTER	SET	utf8
    DEFAULT	COLLATE	utf8_general_ci;

USE InCasa;

-- Tabela responsável pelas configurações do app --
CREATE TABLE aplicativo(
	idAplicativo	INT				AUTO_INCREMENT NOT NULL,
    nome			VARCHAR(20)		NOT NULL,
    mac				VARCHAR(17)		NOT NULL,
	CONSTRAINT	pk_aplicativo	PRIMARY KEY	(idAplicativo)
);

-- Tabela responsável pelas configurações do Arduino --
CREATE TABLE arduino(
	idArduino		INT				AUTO_INCREMENT NOT NULL,
	ip				VARCHAR(15)		NOT NULL,
    mac				VARCHAR(17)		NOT NULL,
	gateway			VARCHAR(15)		NOT NULL,
	mask			VARCHAR(15)		NOT NULL,
	porta			VARCHAR(15)		NOT NULL,
	pinDHT22		VARCHAR(2)		NOT NULL,
	pinRELE1		VARCHAR(2)		NOT NULL,
	pinRELE2		VARCHAR(2)		NOT NULL,
	pinRELE3		VARCHAR(2)		NOT NULL,
	pinRELE4		VARCHAR(2)		NOT NULL,
	pinLDR			VARCHAR(2)		NOT NULL,
	pinPresenca		VARCHAR(2)		NOT NULL,
    CONSTRAINT	pk_arduino	PRIMARY KEY	(idArduino)
);

-- Tabela responsável pelas informações do sensor --
CREATE TABLE sensorLuminosidade(
	idSensor	INT				AUTO_INCREMENT NOT NULL,
    nome		VARCHAR(30)		NOT NULL,
	descricao	VARCHAR(40)		NOT NULL,	
	CONSTRAINT	pk_sensor_luminosidade	PRIMARY KEY	(idSensor)
);

-- Tabela responsável pelos valores do sensor --
CREATE TABLE luminosidadeValor(
	idLuminosidadeValor		INT			AUTO_INCREMENT	NOT NULL,
    valor					DOUBLE		NOT NULL,
	dataHorario				DATETIME	NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    idSensorLuminosidade	INT			NOT NULL,
    CONSTRAINT	pk_luminosidade_valor	PRIMARY KEY	(idLuminosidadeValor),
    CONSTRAINT	fk_sensor_luminosidade FOREIGN KEY (idSensorLuminosidade)
		REFERENCES sensorLuminosidade(idSensor)
);

-- Tabela responsável pelas informações do sensor --
CREATE TABLE sensorTemperatura(
	idSensor	INT				AUTO_INCREMENT NOT NULL,
    nome		VARCHAR(30)		NOT NULL,
	descricao	VARCHAR(40)		NOT NULL,		
	CONSTRAINT	pk_sensor_temperatura	PRIMARY KEY	(idSensor)
);

-- Tabela responsável pelos valores do sensor --
CREATE TABLE temperaturaValor(
	idTemperaturaValor		INT			AUTO_INCREMENT	NOT NULL,
    valor					DOUBLE		NOT NULL,
	dataHorario				DATETIME	NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    idSensorTemperatura		INT			NOT NULL,
    CONSTRAINT	pk_temperatura_valor	PRIMARY KEY	(idTemperaturaValor),
    CONSTRAINT	fk_sensor_temperatura FOREIGN KEY (idSensorTemperatura)
		REFERENCES sensorTemperatura(idSensor)
);

-- Tabela responsável pelas informações do sensor --
CREATE TABLE sensorUmidade(
	idSensor	INT				AUTO_INCREMENT NOT NULL,
    nome		VARCHAR(30)		NOT NULL,
	descricao	VARCHAR(40)		NOT NULL,	
	CONSTRAINT	pk_sensor_umidade	PRIMARY KEY	(idSensor)
);

-- Tabela responsável pelos valores do sensor --
CREATE TABLE umidadeValor(
	idUmidadeValor			INT			AUTO_INCREMENT	NOT NULL,
    valor					DOUBLE		NOT NULL,
	dataHorario				DATETIME	NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    idSensorUmidade			INT			NOT NULL,
    CONSTRAINT	pk_umidade_valor	PRIMARY KEY	(idUmidadeValor),
    CONSTRAINT	fk_sensor_umidade FOREIGN KEY (idSensorUmidade)
		REFERENCES sensorUmidade(idSensor)
);

-- Tabela responsável pelas informações do rele --
CREATE TABLE rele(
	idRele		INT				AUTO_INCREMENT NOT NULL,
    nome		VARCHAR(30)		NOT NULL,
	descricao	VARCHAR(40)		NOT NULL,
	porta		INT				NOT NULL,
	CONSTRAINT	pk_rele	PRIMARY KEY	(idRele)
);

-- Tabela responsável pelos valores do sensor --
CREATE TABLE releValor(
	idReleValor			INT			AUTO_INCREMENT	NOT NULL,
    valor				INT			NOT NULL,
	dataHorario			DATETIME	NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    idRele				INT			NOT NULL,
    CONSTRAINT	pk_rele_valor	PRIMARY KEY	(idReleValor),
    CONSTRAINT	fk_rele_valor FOREIGN KEY (idRele)
		REFERENCES rele(idRele)

);

-- Tabela responsável pelas informações do sensor --
CREATE TABLE sensorPresenca(
	idSensor	INT				AUTO_INCREMENT NOT NULL,
    nome		VARCHAR(30)		NOT NULL,
	descricao	VARCHAR(40)		NOT NULL,	
	CONSTRAINT	pk_sensor_presenca	PRIMARY KEY	(idSensor)
);

-- Tabela responsável pelos valores do sensor --
CREATE TABLE presencaValor(
	idPresencaValor			INT			AUTO_INCREMENT	NOT NULL,
    valor					BOOLEAN		NOT NULL,
	dataHorario				DATETIME	NOT NULL	 DEFAULT CURRENT_TIMESTAMP,
    idSensorPresenca		INT			NOT NULL,
    CONSTRAINT	pk_presenca_valor	PRIMARY KEY	(idPresencaValor),
    CONSTRAINT	fk_sensor_presenca FOREIGN KEY (idSensorPresenca)
		REFERENCES sensorPresenca(idSensor)
);

-- Tabela responsável pelos usuarios do aplicativo --
CREATE TABLE userS(
	idUserS	INT				AUTO_INCREMENT	NOT NULL,
	nome		VARCHAR(40)		NOT NULL,
    login		VARCHAR(20)		NOT NULL UNIQUE,
    senha		VARCHAR(60)		NOT NULL,
    CONSTRAINT	pk_userS	PRIMARY KEY	(idUserS)
);

/*Aplicativo*/
INSERT INTO aplicativo (nome, mac) 
	VALUES("Incasa-Phone", "00:00:00:00");
    
/*Arduino*/
INSERT INTO arduino (ip, mac, gateway, mask, porta, pinDHT22, pinRELE1, pinRELE2, pinRELE3, pinRELE4, pinLDR, pinPresenca)
	VALUES("192.168.0.150", "00-00-00-00", "192.168.0.1", "255.255.255.0", "80", "5", "7", "8", "9", "10", "A0", "6");

/*Sensor Temperatura*/
INSERT INTO sensorTemperatura (nome, descricao)
	VALUES("Sensor Temperatura", "Sensor de Temperatura");
    
INSERT INTO temperaturaValor (valor, idSensorTemperatura)
	VALUES(0, 1);

/*Sensor Umidade*/    
INSERT INTO sensorUmidade (nome, descricao)
	VALUES("Sensor Umidade", "Sensor de Umidade");
    
INSERT INTO umidadeValor (valor, idSensorUmidade)
	VALUES(0, 1);

/*Sensor Luminosidade*/ 
INSERT INTO sensorLuminosidade (nome, descricao)
	VALUES("Sensor Luminosidade", "Sensor de Luminosidade");
        
INSERT INTO luminosidadeValor (valor, idSensorLuminosidade)
	VALUES(0, 1);        
        
/*Sensor Presença*/         
INSERT INTO sensorPresenca (nome, descricao)
	VALUES("Sensor Presença", "Sensor de Presença");
    
INSERT INTO presencaValor (valor, idSensorPresenca)
	VALUES(0, 1);
    
/*Rele 1*/
INSERT INTO rele (nome, descricao, porta)
	VALUES("Rele 1", "Rele canal 1", 7);
    
INSERT INTO releValor (valor, idRele)
	VALUES(0, 1);

/*Rele 2*/
INSERT INTO rele (nome, descricao, porta)
	VALUES("Rele 2", "Rele canal 2", 8);

INSERT INTO releValor (valor, idRele)
	VALUES(0, 2);

/*Rele 3*/
INSERT INTO rele (nome, descricao, porta)
	VALUES("Rele 3", "Rele canal 3", 9);
    
INSERT INTO releValor (valor, idRele)
	VALUES(0, 3);

/*Rele 4*/
INSERT INTO rele (nome, descricao, porta)
	VALUES("Rele 4", "Rele canal 4", 10);
    
INSERT INTO releValor (valor, idRele)
	VALUES(0, 4);    

/*users*/
INSERT INTO USERS (nome, login, senha)
	VALUES("InCasa", "incasa", "$2a$08$96ab45367c9ef8c24f1dauILFVbbKJ6o7KCTVppq8heZFAHSgNHxG");
