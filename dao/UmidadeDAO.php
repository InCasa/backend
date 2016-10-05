<?php

    class UmidadeDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
             
        public function create($umidade) {
            $sql = $this->con->prepare("INSERT INTO sensorUmidade(nome, descricao, valor) VALUES (?, ?, ?)");
            $sql->bindParam(1, $umidade->getNome());
            $sql->bindParam(2, $umidade->getDescricao());
            $sql->bindParam(3, $umidade->getValor());
            $sql->execute();            
        }

        public function update($umidade) {
            $sql = $this->con->prepare("UPDATE sensorUmidade SET nome = ?, descricao = ?, valor = ? WHERE idSensor = ?");
            $sql->bindParam(1, $umidade->getNome());
            $sql->bindParam(2, $umidade->getDescricao());
            $sql->bindParam(3, $umidade->getValor());
            $sql->bindParam(4, $umidade->getIdUmidade());
            $sql->execute();             
        }

        public function delete($umidade) {
            $sql = $this->con->prepare("DELETE FROM sensorUmidade WHERE idSensor = ?");
            $sql->bindParam(1, $umidade->getIdUmidade());
            $sql->execute();
        }

        public function getUmidade() {
            
        }

    }