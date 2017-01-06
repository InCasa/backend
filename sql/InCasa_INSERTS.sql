use incasa;

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
    

    

    
