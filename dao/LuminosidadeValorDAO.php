<?php

	class LuminosidadeVAlorDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
			
		public function create($luminosidadeValor) {
            if(!empty($luminosidadeValor->getIdLuminosidade()) {
                $sql = $this->con->prepare("INSERT INTO luminosidadeValor(valor, dataHorario, idSensorLuminosidade) VALUES (?, ?, ?)");
                $sql->bindParam(1, $luminosidadeValor->getValor());
                $sql->bindParam(2, $luminosidadeValor->getDataHorario());
                $sql->bindParam(3, $luminosidadeValor->getIdSensorLuminosidade());
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

		public function getLuminosidadeValor() {
			
		}
							
	}