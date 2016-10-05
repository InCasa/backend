<?php

    class TemperaturaDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
            
        public function create($temperatura) {
            $sql = $this->con->prepare("INSERT INTO sensorTemperatura(nome, descricao, valor) VALUES (?, ?, ?)");
            $sql->bindParam(1, $temperatura->getNome());
            $sql->bindParam(2, $temperatura->getDescricao());
            $sql->bindParam(3, $temperatura->getValor());
            $sql->execute();            
        }

        public function update($temperatura) {
            $sql = $this->con->prepare("UPDATE sensorTemperatura SET nome = ?, descricao = ?, valor = ? WHERE idSensor = ?");
            $sql->bindParam(1, $temperatura->getNome());
            $sql->bindParam(2, $temperatura->getDescricao());
            $sql->bindParam(3, $temperatura->getValor());
            $sql->bindParam(4, $temperatura->getIdTemperatura());
            $sql->execute();             
        }

        public function delete($temperatura) {
            $sql = $this->con->prepare("DELETE FROM sensorTemperatura WHERE idSensor = ?");
            $sql->bindParam(1, $temperatura->getIdTemperatura());
            $sql->execute();
        }

        public function getTemperatura() {
            
        }

    }