<?php

    class UmidadeDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
             
        public function create($umidade) {
            $sql = $this->con->prepare("INSERT INTO sensorUmidade(nome, descricao) VALUES (?, ?)");
            $sql->bindParam(1, $umidade->getNome());
            $sql->bindParam(2, $umidade->getDescricao());
            $sql->execute();            
        }

        public function update($umidade) {
            $sql = $this->con->prepare("UPDATE sensorUmidade SET nome = ?, descricao = ? WHERE idSensor = ?");
            $sql->bindParam(1, $umidade->getNome());
            $sql->bindParam(2, $umidade->getDescricao());
            $sql->bindParam(3, $umidade->getIdUmidade());
            $sql->execute();             
        }

        public function delete($umidade) {
            $sql = $this->con->prepare("DELETE FROM sensorUmidade WHERE idSensor = ?");
            $sql->bindParam(1, $umidade->getIdUmidade());
            $sql->execute();
        }

        public function getUmidade($id) {
            $sql = $this->con->prepare("SELECT * FROM sensorUmidade WHERE idSensor = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $umidade = new Umidade();
            $umidade->setIdUmidade((int)$row['idSensor']);
            $umidade->setNome($row['nome']);
            $umidade->setDescricao($row['descricao']);
            
            return $umidade;
        }

    }