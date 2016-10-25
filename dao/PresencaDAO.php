<?php

	class PresencaDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
			
		public function create($presenca) {
			$sql = $this->con->prepare("INSERT INTO sensorPresenca(nome, descricao) VALUES (?, ?)");
			$sql->bindParam(1, $presenca->getNome());
			$sql->bindParam(2, $presenca->getDescricao());
			$sql->execute();            
		}

		public function update($presenca) {
			$sql = $this->con->prepare("UPDATE sensorPresenca SET nome = ?, descricao = ? WHERE idSensor = ?");
			$sql->bindParam(1, $presenca->getNome());
			$sql->bindParam(2, $presenca->getDescricao());
			$sql->bindParam(3, $presenca->getIdPresenca());
			$sql->execute();             
		}

		public function delete($presenca) {
			$sql = $this->con->prepare("DELETE FROM sensorPresenca WHERE idSensor = ?");
			$sql->bindParam(1, $presenca->getIdPresenca());
			$sql->execute();
		}

		public function getPresenca($id) {
			$sql = $this->con->prepare("SELECT * FROM sensorPresenca WHERE idSensor = ?");
			$sql->bindParam(1, $id);
			$sql->execute();
            $row = $sql->fetch();
            
            $presenca = new Presenca();
            $presenca->setIdPresenca((int)$row['idSensor']);
            $presenca->setNome($row['nome']);
            $presenca->setDescricao($row['descricao']);
            
            return $presenca;
		}
							
	}			