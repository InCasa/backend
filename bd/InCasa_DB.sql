CREATE DATABASE InCasa
	DEFAULT	CHARACTER	SET	utf8
    DEFAULT	COLLATE	utf8_general_ci;

USE InCasa;

-- Tabela responsável pelas configurações do app --
CREATE TABLE aplicativo(
	idAplicativo	INT				AUTO_INCREMENT NOT NULL,
    mac			VARCHAR(17)		NOT NULL,
	CONSTRAINT	pk_aplicativo	PRIMARY KEY	(idAplicativo)
);

-- Tabela responsável pelas configurações do Arduino --
CREATE TABLE arduino(
	idArduino	INT				AUTO_INCREMENT NOT NULL,
	ip			INT				NOT NULL,
    mac			VARCHAR(15)		NOT NULL,
	gateway		VARCHAR(15)		NOT NULL,
	mask		VARCHAR(15)		NOT NULL,
	porta		VARCHAR(15)		NOT NULL,
	pinDHT22	INT				NOT NULL,
	pinRELE1	INT				NOT NULL,
	pinRELE2	INT				NOT NULL,
	pinRELE3	INT				NOT NULL,
	pinRELE4	INT				NOT NULL,
	pinLDR		INT				NOT NULL,
	cod			INT				NOT NULL,
    CONSTRAINT	pk_arduino	PRIMARY KEY	(idArduino)
);

-- Tabela responsável pelas informações do sensor --
CREATE TABLE sensorLuminosidade(
	idSensor	INT				AUTO_INCREMENT NOT NULL,
    nome		VARCHAR(12)		NOT NULL,
	descricao	VARCHAR(40)		NOT NULL,
	valor		DOUBLE			NOT NULL,	
	CONSTRAINT	pk_sensor_luminosidade	PRIMARY KEY	(idSensor)
);

-- Tabela responsável pelas informações do sensor --
CREATE TABLE sensorTemperatura(
	idSensor	INT				AUTO_INCREMENT NOT NULL,
    nome		VARCHAR(12)		NOT NULL,
	descricao	VARCHAR(40)		NOT NULL,	
	valor		DOUBLE			NOT NULL,
	CONSTRAINT	pk_sensor_temperatura	PRIMARY KEY	(idSensor)
);

-- Tabela responsável pelas informações do sensor --
CREATE TABLE sensorUmidade(
	idSensor	INT				AUTO_INCREMENT NOT NULL,
    nome		VARCHAR(12)		NOT NULL,
	descricao	VARCHAR(40)		NOT NULL,
	valor		DOUBLE			NOT NULL,
	CONSTRAINT	pk_sensor_umidade	PRIMARY KEY	(idSensor)
);

-- Tabela responsável pelas informações do rele --
CREATE TABLE rele(
	idRele		INT				AUTO_INCREMENT NOT NULL,
    nome		VARCHAR(12)		NOT NULL,
	descricao	VARCHAR(40)		NOT NULL,
	porta		INT				NOT NULL,
	CONSTRAINT	pk_rele	PRIMARY KEY	(idRele)
);

-- Tabela responsável pelos usuarios do aplicativo --
CREATE TABLE userS(
	idUserS	INT				AUTO_INCREMENT	NOT NULL,
	nome		VARCHAR(40)		NOT NULL,
    login		VARCHAR(10)		NOT NULL,
    senha		VARCHAR(10)		NOT NULL,
    CONSTRAINT	pk_userS	PRIMARY KEY	(idUserS)
);