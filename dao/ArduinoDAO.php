<?php

    class ArduinoDAO{

        public function __construct(){

        }

        public function create($arduino) {
            $con = database::getInstance();
            $sql = $con->prepare("INSERT INTO arduino(ip, mac, gateway, mask, porta, pinDHT22, pinRELE1, pinRELE2, pinRELE3, pinRELE4, pinLDR, cod) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->bindParam(1, $arduino->getIP());
            $sql->bindParam(2, $arduino->getMAC());
            $sql->bindParam(3, $arduino->getGateway());
            $sql->bindParam(4, $arduino->getMask());
            $sql->bindParam(5, $arduino->getPorta());
            $sql->bindParam(6, $arduino->getPinoDHT());
            $sql->bindParam(7, $arduino->getPinoRele1());
            $sql->bindParam(8, $arduino->getPinoRele2());
            $sql->bindParam(9, $arduino->getPinoRele3());
            $sql->bindParam(10, $arduino->getPinoRele4());
            $sql->bindParam(11, $arduino->getPinoLDR());
            $sql->bindParam(12, $arduino->getCod());
            $sql->execute();            
        }

        public function update($arduino) {
            $con = database::getInstance();
            $sql = $con->prepare("UPDATE arduino SET ip = ?, mac = ?, gateway = ?, mask = ?, porta = ?, pinDHT22 = ?, pinRELE1 = ?, pinRELE2 = ?, pinRELE3 = ?, pinRELE4 = ?, pinLDR = ?, cod = ? WHERE idArduino = ?");
            $sql->bindParam(1, $arduino->getIP());
            $sql->bindParam(2, $arduino->getMAC());
            $sql->bindParam(3, $arduino->getGateway());
            $sql->bindParam(4, $arduino->getMask());
            $sql->bindParam(5, $arduino->getPorta());
            $sql->bindParam(6, $arduino->getPinoDHT());
            $sql->bindParam(7, $arduino->getPinoRele1());
            $sql->bindParam(8, $arduino->getPinoRele2());
            $sql->bindParam(9, $arduino->getPinoRele3());
            $sql->bindParam(10, $arduino->getPinoRele4());
            $sql->bindParam(11, $arduino->getPinoLDR());
            $sql->bindParam(12, $arduino->getCod());
            $sql->bindParam(13, $arduino->getIdArduino());
            $sql->execute();             
        }

        public function delete($arduino) {
            $con = database::getInstance();
            $sql = $con->prepare("DELETE FROM arduino WHERE idArduino = ?");
            $sql->bindParam(1, $arduino->getIdArduino());
            $sql->execute();
        }

        public function getArduino() {
            
        }
    }