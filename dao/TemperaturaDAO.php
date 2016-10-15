<?php

    class TemperaturaDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
            
        public function create($temperatura) {
            $sql = $this->con->prepare("INSERT INTO sensorTemperatura(nome, descricao) VALUES (?, ?)");
            $sql->bindParam(1, $temperatura->getNome());
            $sql->bindParam(2, $temperatura->getDescricao());
            $sql->execute();            
        }

        public function update($temperatura) {
            $sql = $this->con->prepare("UPDATE sensorTemperatura SET nome = ?, descricao = ? WHERE idSensor = ?");
            $sql->bindParam(1, $temperatura->getNome());
            $sql->bindParam(2, $temperatura->getDescricao());
            $sql->bindParam(3, $temperatura->getIdTemperatura());
            $sql->execute();             
        }

        public function delete($temperatura) {
            $sql = $this->con->prepare("DELETE FROM sensorTemperatura WHERE idSensor = ?");
            $sql->bindParam(1, $temperatura->getIdTemperatura());
            $sql->execute();
        }

        public function getTemperatura($id) {
            $sql = $this->con->prepare("SELECT * FROM sensorTemperatura WHERE idSensor = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $temperatura = new Temperatura();
            $temperatura->setIdTemperatura((int)$row['idSensor']);
            $temperatura->setNome($row['nome']);
            $temperatura->setDescricao($row['descricao']);
            
            return $temperatura;
        }   
        

    }