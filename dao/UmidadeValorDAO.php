<?php

    class UmidadeValorDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
             
        public function create($umidadeValor) {
            if(!empty($umidadeValor->getIdUmidade())){
            $sql = $this->con->prepare("INSERT INTO umidadeValor(valor, dataHorario, idSensorUmidade) VALUES (?, now(), ?)");
            $sql->bindParam(1, $umidadeValor->getValor());
            $sql->bindParam(2, $umidadeValor->getIdUmidade());
            $sql->execute();
            }else{
                return "erro";
            }            
        }

        public function delete($umidadeValor) {
            $sql = $this->con->prepare("DELETE FROM umidadeValor WHERE idUmidadeValor = ?");
            $sql->bindParam(1, $umidadeValor->getIdUmidadeValor());
            $sql->execute();
        }

        public function getUmidadeValor($id) {
            $sql = $this->con->prepare("SELECT * FROM umidadeValor WHERE idUmidadeValor = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $umidadeValor = new UmidadeValor();
            $umidadeValor->setIdUmidadeValor((int)$row['idUmidadeValor']);
            $umidadeValor->setValor((double)$row['valor']);
            $umidadeValor->setDataHorario($row['dataHorario']);
            $umidadeValor->setIdUmidade((int)$row['idSensorUmidade']);
            
            return $umidadeValor;
        }

        public function getAll(){
            $umidadeValores = array();

            $sql = "SELECT * FROM umidadeValor";

            foreach ($this->con->query($sql) as $row) {
                $umidadeValor = new UmidadeValor();
                $umidadeValor->setIdUmidadeValor((int)$row['idUmidadeValor']);
                $umidadeValor->setValor((double)$row['valor']);
                $umidadeValor->setDataHorario($row['dataHorario']);
                $umidadeValor->setIdUmidade((int)$row['idSensorUmidade']);

                $umidadeValores[] = $umidadeValor;
            }

            return $umidadeValores;
        }

        public function getLast(){            
            $sql = $this->con->prepare("SELECT * FROM umidadeValor ORDER BY idUmidadeValor DESC");
            $sql->execute();
            $row = $sql->fetch();
            
            $umidadeValor = new UmidadeValor();             
            $umidadeValor->setValor($row['valor']);

            return $umidadeValor;
        }

    }