<?php

	class LuminosidadeDAO{

		public function __construct(){

		}
			
		public function create($luminosidade) {
			$con = database::getInstance();
			$sql = $con->prepare("INSERT INTO sensorLuminosidade(nome, descricao, valor) VALUES (?, ?, ?)");
			$sql->bindParam(1, $luminosidade->getNome());
			$sql->bindParam(2, $luminosidade->getDescricao());
			$sql->bindParam(3, $luminosidade->getValor());
			$sql->execute();            
		}

		public function update($luminosidade) {
			$con = database::getInstance();
			$sql = $con->prepare("UPDATE sensorLuminosidade SET nome = ?, descricao = ?, valor = ? WHERE idSensor = ?");
			$sql->bindParam(1, $luminosidade->getNome());
			$sql->bindParam(2, $luminosidade->getDescricao());
			$sql->bindParam(3, $luminosidade->getValor());
			$sql->bindParam(4, $luminosidade->getIdLuminosidade());
			$sql->execute();             
		}

		public function delete($luminosidade) {
			$con = database::getInstance();
			$sql = $con->prepare("DELETE FROM sensorLuminosidade WHERE idSensor = ?");
			$sql->bindParam(1, $luminosidade->getIdLuminosidade());
			$sql->execute();
		}

		public function getLuminosidade() {
			
		}
							
	}			