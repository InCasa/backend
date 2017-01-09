<?php

    class ArduinoDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }

        public function create($arduino) {
            $sql = $this->con->prepare("INSERT INTO arduino(ip, mac, gateway, mask, porta, pinDHT22, pinRELE1, pinRELE2, pinRELE3, pinRELE4, pinLDR, pinPresenca) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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
            $sql->bindParam(12, $arduino->getPinoPresenca());
            $sql->execute();            
        }

        public function update($arduino) {
            $sql = $this->con->prepare("UPDATE arduino SET ip = ?, mac = ?, gateway = ?, mask = ?, porta = ?, pinDHT22 = ?, pinRELE1 = ?, pinRELE2 = ?, pinRELE3 = ?, pinRELE4 = ?, pinLDR = ?, pinPresenca = ? WHERE idArduino = ?");
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
            $sql->bindParam(12, $arduino->getPinoPresenca());
            $sql->bindParam(13, $arduino->getIdArduino());
            $sql->execute();             
        }

        public function delete($arduino) {
            $sql = $this->con->prepare("DELETE FROM arduino WHERE idArduino = ?");
            $sql->bindParam(1, $arduino->getIdArduino());
            $sql->execute();
        }

        public function getArduino($id) {
            $sql = $this->con->prepare("SELECT * FROM arduino WHERE idArduino = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $arduino = new Arduino();
            $arduino->setIdArduino((int)$row['idArduino']);
            $arduino->setIp($row['ip']);
            $arduino->setMAC($row['mac']);
            $arduino->setGateway($row['gateway']);
            $arduino->setMask($row['mask']);
            $arduino->setPorta($row['porta']);
            $arduino->setPinoDHT22($row['pinDHT22']);
            $arduino->setPinoRele1($row['pinRELE1']);
            $arduino->setPinoRele2($row['pinRELE2']);
            $arduino->setPinoRele3($row['pinRELE3']);
            $arduino->setPinoRele4($row['pinRELE4']);
            $arduino->setPinoLDR($row['pinLDR']);
            $arduino->setPinoPresenca($row['pinPresenca']);
            
            return $arduino;
        }

        public function getAll(){
            $Arduinos = array();

            $sql = "SELECT * FROM arduino";

            foreach ($this->con->query($sql) as $row) {
                $arduino = new Arduino();
                $arduino->setIdArduino((int)$row['idArduino']);
                $arduino->setIp($row['ip']);
                $arduino->setMAC($row['mac']);
                $arduino->setGateway($row['gateway']);
                $arduino->setMask($row['mask']);
                $arduino->setPorta($row['porta']);
                $arduino->setPinoDHT22($row['pinDHT22']);
                $arduino->setPinoRele1($row['pinRELE1']);
                $arduino->setPinoRele2($row['pinRELE2']);
                $arduino->setPinoRele3($row['pinRELE3']);
                $arduino->setPinoRele4($row['pinRELE4']);
                $arduino->setPinoLDR($row['pinLDR']); 
                $arduino->setPinoPresenca($row['pinPresenca']);

                $Arduinos[] = $arduino;
            }

            return $Arduinos;
        }

        public function getLast(){            
            $sql = $this->con->prepare("SELECT * FROM arduino ORDER BY idArduino DESC");
            $sql->execute();
            $row = $sql->fetch();
            
                $arduino = new Arduino();
                $arduino->setIdArduino((int)$row['idArduino']);
                $arduino->setIp($row['ip']);
                $arduino->setMAC($row['mac']);
                $arduino->setGateway($row['gateway']);
                $arduino->setMask($row['mask']);
                $arduino->setPorta($row['porta']);
                $arduino->setPinoDHT22($row['pinDHT22']);
                $arduino->setPinoRele1($row['pinRELE1']);
                $arduino->setPinoRele2($row['pinRELE2']);
                $arduino->setPinoRele3($row['pinRELE3']);
                $arduino->setPinoRele4($row['pinRELE4']);
                $arduino->setPinoLDR($row['pinLDR']); 
                $arduino->setPinoPresenca($row['pinPresenca']); 

            return $arduino;
        }

    }