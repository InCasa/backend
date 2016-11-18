<?php

    class TemperaturaValorDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
            
        public function create($temperaturaValor) {
            if(!empty($temperaturaValor->getIdTemperatura())) {
                $sql = $this->con->prepare("INSERT INTO temperaturaValor(valor, dataHorario, idSensorTemperatura) VALUES (?, now(), ?)");
                $sql->bindParam(1, $temperaturaValor->getValor());
                $sql->bindParam(2, $temperaturaValor->getIdTemperatura());
                $sql->execute();   
            } else {
                return "erro";
            }                        
        }

        public function delete($temperaturaValor) {
            $sql = $this->con->prepare("DELETE FROM temperaturaValor WHERE idTemperaturaValor = ?");
            $sql->bindParam(1, $temperaturaValor->getIdTemperaturaValor());
            $sql->execute();
        }

        public function getTemperaturaValor($id) {
            $sql = $this->con->prepare("SELECT * FROM temperaturaValor WHERE idTemperaturaValor = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $temperaturaValor = new TemperaturaValor();
            $temperaturaValor->setIdTemperaturaValor((int)$row['idTemperaturaValor']);
            $temperaturaValor->setValor($row['valor']);
            $temperaturaValor->setDataHorario($row['dataHorario']);
            $temperaturaValor->setIdTemperatura((int)$row['idSensorTemperatura']);
            
            return $temperaturaValor;
        }

        public function getAll(){
            $temepraturaValores = array();

            $sql = "SELECT * FROM temperaturaValor";

            foreach ($this->con->query($sql) as $row) {
                $temperaturaValor = new TemperaturaValor();
                $temperaturaValor->setIdTemperaturaValor((int)$row['idTemperaturaValor']);
                $temperaturaValor->setValor($row['valor']);
                $temperaturaValor->setDataHorario($row['dataHorario']);
                $temperaturaValor->setIdTemperatura((int)$row['idSensorTemperatura']);

                $temepraturaValores[] = $temperaturaValor;
            }

            return $temepraturaValores;
        }

    }