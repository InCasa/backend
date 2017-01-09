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

        public function getAll(){
            $temperaturas = array();

            $sql = "SELECT * FROM sensorTemperatura";

            foreach ($this->con->query($sql) as $row) {
                $temperatura = new Temperatura();
                $temperatura->setIdTemperatura((int)$row['idSensor']);
                $temperatura->setNome($row['nome']);
                $temperatura->setDescricao($row['descricao']);

                $temperaturas[] = $temperatura;
            }

            return $temperaturas;
        }

        public function getLast(){            
            $sql = $this->con->prepare("SELECT * FROM sensorTemperatura ORDER BY idSensor DESC");
            $sql->execute();
            $row = $sql->fetch();
            
                $temperatura = new Temperatura();
                $temperatura->setIdTemperatura((int)$row['idSensor']);
                $temperatura->setNome($row['nome']);
                $temperatura->setDescricao($row['descricao']);

            return $temperatura;
        }
        

    }