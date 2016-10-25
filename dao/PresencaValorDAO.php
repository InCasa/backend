<?php

	class PresencaVAlorDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
			
		public function create($presencaValor) {
            if(!empty($presencaValor->getIdSensorPresenca())) {
                $sql = $this->con->prepare("INSERT INTO presencaValor(valor, dataHorario, idSensorPresenca) VALUES (?, now(), ?)");
                $sql->bindParam(1, $presencaValor->getValor());                
                $sql->bindParam(2, $presencaValor->getIdSensorPresenca());
                $sql->execute();
            } else {
                return "erro";
            }			            
		}

		public function delete($presencaValor) {
            if(!empty($presencaValor->getIdSensorPresenca())) {
                $sql = $this->con->prepare("DELETE FROM presencaValor WHERE idPresencaValor = ?");
			    $sql->bindParam(1, $presencaValor->getIdPresencaValor());
			    $sql->execute();    
            } else {
                return "erro";
            }                                    			
		}

		public function getPresencaValor($id) {
			    $sql = $this->con->prepare("SELECT * FROM presencaValor WHERE idPresencaValor = ?");
			    $sql->bindParam(1, $id);
			    $sql->execute();
                $row = $sql->fetch();
                
                $presencaValor = new PresencaValor();
                $presencaValor->setIdPresencaValor((int)$row['idPresencaValor']);
                $presencaValor->setValor((double)$row['valor']);
                $presencaValor->setDataHorario($row['dataHorario']);
                $presencaValor->setIdSensorPresenca((int)$row['idSensorPresenca']);
                
                return $presencaValor;
		}
							
	}