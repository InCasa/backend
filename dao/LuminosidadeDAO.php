<?php

	class LuminosidadeDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
			
		public function create($luminosidade) {
			$sql = $this->con->prepare("INSERT INTO sensorLuminosidade(nome, descricao, valor) VALUES (?, ?, ?)");
			$sql->bindParam(1, $luminosidade->getNome());
			$sql->bindParam(2, $luminosidade->getDescricao());
			$sql->bindParam(3, $luminosidade->getValor());
			$sql->execute();            
		}

		public function update($luminosidade) {
			$sql = $this->con->prepare("UPDATE sensorLuminosidade SET nome = ?, descricao = ?, valor = ? WHERE idSensor = ?");
			$sql->bindParam(1, $luminosidade->getNome());
			$sql->bindParam(2, $luminosidade->getDescricao());
			$sql->bindParam(3, $luminosidade->getValor());
			$sql->bindParam(4, $luminosidade->getIdLuminosidade());
			$sql->execute();             
		}

		public function delete($luminosidade) {
			$sql = $this->con->prepare("DELETE FROM sensorLuminosidade WHERE idSensor = ?");
			$sql->bindParam(1, $luminosidade->getIdLuminosidade());
			$sql->execute();
		}

		public function getLuminosidade() {
			
		}
							
	}			