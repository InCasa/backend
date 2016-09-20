<?php

    class UmidadeDAO{

        public function __construct(){

        }
             
        public function create($umidade) {
            $con = database::getInstance();
            $sql = $con->prepare("INSERT INTO sensorUmidade(nome, descricao, valor) VALUES (?, ?, ?)");
            $sql->bindParam(1, $umidade->getNome());
            $sql->bindParam(2, $umidade->getDescricao());
            $sql->bindParam(3, $umidade->getValor());
            $sql->execute();            
        }

        public function update($umidade) {
            $con = database::getInstance();
            $sql = $con->prepare("UPDATE sensorUmidade SET nome = ?, descricao = ?, valor = ? WHERE idSensor = ?");
            $sql->bindParam(1, $umidade->getNome());
            $sql->bindParam(2, $umidade->getDescricao());
            $sql->bindParam(3, $umidade->getValor());
            $sql->bindParam(4, $umidade->getIdUmidade());
            $sql->execute();             
        }

        public function delete($umidade) {
            $con = database::getInstance();
            $sql = $con->prepare("DELETE FROM sensorUmidade WHERE idSensor = ?");
            $sql->bindParam(1, $umidade->getIdUmidade());
            $sql->execute();
        }

        public function getUmidade() {
            
        }

    }