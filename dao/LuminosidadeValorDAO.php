<?php

	class LuminosidadeVAlorDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
			
		public function create($luminosidadeValor) {
            if(!empty($luminosidadeValor->getIdLuminosidade()) {
                $sql = $this->con->prepare("INSERT INTO luminosidadeValor(valor, dataHorario, idSensorLuminosidade) VALUES (?, now(), ?)");
                $sql->bindParam(1, $luminosidadeValor->getValor());                
                $sql->bindParam(2, $luminosidadeValor->getIdSensorLuminosidade());
                $sql->execute();
            } else {
                return "erro";
            }			            
		}

		public function update($luminosidadeValor) {
            if(!empty($luminosidadeValor->getIdLuminosidade()) {
                $sql = $this->con->prepare("UPDATE luminosidadeValor SET valor = ?, dataHorario = ?, idSensorLuminosidade = ? WHERE idLuminosidadeValor = ?");
                $sql->bindParam(1, $luminosidadeValor->getValor());
                $sql->bindParam(2, $luminosidadeValor->getDataHorario());
                $sql->bindParam(3, $luminosidadeValor->getIdSensorLuminosidade());
                $sql->bindParam(4, $luminosidadeValor->getIdLuminosidadeValor());
                $sql->execute();                             
            } else {
                return "erro";
            }                    
		}

		public function delete($luminosidadeValor) {
            if(!empty($luminosidadeValor->getIdLuminosidade()) {
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
							
	}