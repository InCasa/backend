<?php

    class ReleValorDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }

        public function create($releValor) {
            if(!empty($releValor->getIdRele())){
                $sql = $this->con->prepare("INSERT INTO releValor(valor, idRele) VALUES (?, ?)");
                $sql->bindParam(1, $releValor->getValor());
                $sql->bindParam(2, $releValor->getIdRele());
                $sql->execute();   
            }else{
                return "erro";                
            }
                        
        }
        
        public function delete($releValor) {
            $sql = $this->con->prepare("DELETE FROM releValor WHERE idReleValor = ?");
            $sql->bindParam(1, $releValor->getIdRele());
            $sql->execute();
        }

        public function getReleValor($id) {
            $sql = $this->con->prepare("SELECT * FROM releValor WHERE idReleValor = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $releValor = new ReleValor();
            $releValor->setIdRele((int)$row['idRele']);
            $releValor->setValor((int)$row['valor']);
            $releValor->setDataHorario($row['dataHorario']);
            $releValor->setIdReleValor((int)$row['idReleValor']);
            
            return $releValor;
        }

        public function getAll(){
            $releValores = array();

            $sql = "SELECT * FROM releValor";

            foreach ($this->con->query($sql) as $row) {
                $releValor = new ReleValor();
                $releValor->setIdRele((int)$row['idRele']);
                $releValor->setValor((int)$row['valor']);
                $releValor->setDataHorario($row['dataHorario']);
                $releValor->setIdReleValor((int)$row['idReleValor']);

                $releValores[] = $releValor;
            }

            return $releValores;
        }

    }