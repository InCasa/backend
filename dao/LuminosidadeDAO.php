<?php

	class LuminosidadeDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
			
		public function create($luminosidade) {
			$sql = $this->con->prepare("INSERT INTO sensorLuminosidade(nome, descricao) VALUES (?, ?)");
			$sql->bindParam(1, $luminosidade->getNome());
			$sql->bindParam(2, $luminosidade->getDescricao());
			$sql->execute();            
		}

		public function update($luminosidade) {
			$sql = $this->con->prepare("UPDATE sensorLuminosidade SET nome = ?, descricao = ? WHERE idSensor = ?");
			$sql->bindParam(1, $luminosidade->getNome());
			$sql->bindParam(2, $luminosidade->getDescricao());
			$sql->bindParam(3, $luminosidade->getIdLuminosidade());
			$sql->execute();             
		}

		public function delete($luminosidade) {
			$sql = $this->con->prepare("DELETE FROM sensorLuminosidade WHERE idSensor = ?");
			$sql->bindParam(1, $luminosidade->getIdLuminosidade());
			$sql->execute();
		}

		public function getLuminosidade($id) {
			$sql = $this->con->prepare("SELECT * FROM sensorLuminosidade WHERE idSensor = ?");
			$sql->bindParam(1, $id);
			$sql->execute();
            $row = $sql->fetch();
            
            $luminosidade = new Luminosidade();
            $luminosidade->setIdLuminosidade((int)$row['idSensor']);
            $luminosidade->setNome($row['nome']);
            $luminosidade->setDescricao($row['descricao']);
            
            return $luminosidade;
		}

		public function getAll(){
            $luminosidades = array();

            $sql = "SELECT * FROM sensorLuminosidade";

            foreach ($this->con->query($sql) as $row) {
                $luminosidade = new Luminosidade();
                $luminosidade->setIdLuminosidade((int)$row['idSensor']);
				$luminosidade->setNome($row['nome']);
				$luminosidade->setDescricao($row['descricao']);

                $luminosidades[] = $luminosidade;
            }

            return $luminosidades;
        }
							
	}			