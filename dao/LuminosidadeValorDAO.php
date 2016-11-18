<?php

	class LuminosidadeVAlorDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
			
		public function create($luminosidadeValor) {
            if(!empty($luminosidadeValor->getIdSensorLuminosidade())) {
                $sql = $this->con->prepare("INSERT INTO luminosidadeValor(valor, dataHorario, idSensorLuminosidade) VALUES (?, now(), ?)");
                $sql->bindParam(1, $luminosidadeValor->getValor());                
                $sql->bindParam(2, $luminosidadeValor->getIdSensorLuminosidade());
                $sql->execute();
            } else {
                return "erro";
            }			            
		}

		public function delete($luminosidadeValor) {
            if(!empty($luminosidadeValor->getIdSensorLuminosidade())) {
                $sql = $this->con->prepare("DELETE FROM luminosidadeValor WHERE idLuminosidadeValor = ?");
			    $sql->bindParam(1, $luminosidadeValor->getIdLuminosidadeValor());
			    $sql->execute();    
            } else {
                return "erro";
            }                                    			
		}

		public function getLuminosidadeValor($id) {
			    $sql = $this->con->prepare("SELECT * FROM luminosidadeValor WHERE idLuminosidadeValor = ?");
			    $sql->bindParam(1, $id);
			    $sql->execute();
                $row = $sql->fetch();
                
                $luminosidadeValor = new LuminosidadeValor();
                $luminosidadeValor->setIdLuminosidadeValor((int)$row['idLuminosidadeValor']);
                $luminosidadeValor->setValor((double)$row['valor']);
                $luminosidadeValor->setDataHorario($row['dataHorario']);
                $luminosidadeValor->setIdSensorLuminosidade((int)$row['idSensorLuminosidade']);
                
                return $luminosidadeValor;
		}

        public function getAll(){
            $luminosidadeValores = array();

            $sql = "SELECT * FROM luminosidadeValor";

            foreach ($this->con->query($sql) as $row) {
                $luminosidadeValor = new LuminosidadeValor();
                $luminosidadeValor->setIdLuminosidadeValor((int)$row['idLuminosidadeValor']);
                $luminosidadeValor->setValor((double)$row['valor']);
                $luminosidadeValor->setDataHorario($row['dataHorario']);
                $luminosidadeValor->setIdSensorLuminosidade((int)$row['idSensorLuminosidade']); 

                $luminosidadeValores[] = $luminosidadeValor;
            }

            return $luminosidadeValores;
        }
							
	}