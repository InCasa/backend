<?php

    class TemperaturaValorDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
            
        public function create($temperaturaValor) {
            if(!empty($temperatura->getIdTemperatura())) {
                $sql = $this->con->prepare("INSERT INTO temperaturaValor(valor, dataHorario, idSensorTemperatura) VALUES (?, ?, ?)");
                $sql->bindParam(1, $temperaturaValor->getValor());
                $sql->bindParam(2, $temperaturaValor->getDataHorario());
                $sql->bindParam(3, $temperaturaValor->getIdTemperatura());
                $sql->execute();   
            } else {
                return "erro";
            }                        
        }

        public function update($temperaturaValor) {
            $sql = $this->con->prepare("UPDATE temperaturaValor SET valor = ?, dataHorario = ?, idSensorTemperatura = ? WHERE idTemperaturaValor = ?");
            $sql->bindParam(1, $temperaturaValor->getValor());
            $sql->bindParam(2, $temperaturaValor->getDataHorario());
            $sql->bindParam(3, $temperaturaValor->idSensorTemperatura());
            $sql->bindParam(4, $temperaturaValor->idTemperaturaValor());
            $sql->execute();             
        }

        public function delete($temperaturaValor) {
            $sql = $this->con->prepare("DELETE FROM temperaturaValor WHERE idTemperaturaValor = ?");
            $sql->bindParam(1, $temperaturaValor->getIdTemperaturaValor());
            $sql->execute();
        }

        public function getTemperatura($id) {
            $sql = $this->con->prepare("SELECT * FROM temperaturaValor WHERE idTemperaturaValor = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $temperaturaValor = new TemperaturaValor();
            $temperaturaValor-setIdLuminosidadeValor((int)$row['idTemperaturaValor']);
            $temperaturaValor->setValor($row['valor']);
            $temperaturaValor->setDataHorario($row['dataHorario']);
            $temperaturaValor->setIdSensorLuminosidade((int)$row['idSensorTemperatura']);
            
            return $temperaturaValor;
        }

    }