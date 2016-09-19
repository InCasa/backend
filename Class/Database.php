<?php
    class database {

        private $DBHOST = 'localhost';
		private $DBPORT = '3306';
		private $DBNAME = 'InCasa';
		private $DBUSER = 'root';
		private $DBPASS = '';
		private static $con;
		
			
		private function __construct() {						
			$this->conectar();
		}
		
		// Cria uma conexão ao banco de dados	
		public function conectar(){
			$opcoes = array(
			    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
			);
			
			$this->con = new PDO('mysql:host=' . $this->DBHOST . ';dbname='.$this->DBNAME, $this->DBUSER, $this->DBPASS, $opcoes);

		}

		// Retorna a instância de database
		public static function getInstance() {
			if (empty(self::$con)) {
				self::$con = new database();
			}
			return self::$con;
    }


		//CRUD
		public function insert($sql, $values) {
			$stmt = $this->con->prepare($sql);
			
			for($i = 0; $i < count($values); $i++) {
				$stmt->bindParam($i + 1, $values[$i]);
			}
						
			if($stmt->execute()) {
				return true;
			} else {
				echo $stmt->errorInfo()[2];
				return false;
			}
		}

		public function select($sql, $values) {
			$stmt = $this->con->prepare($sql);
			for($i = 0; $i < count($values); $i++) {
				$stmt->bindParam($i + 1, $values[$i]);
			}
			
			$return = array();
          			
			if($stmt->execute()) {
				while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
					$return[] = $row;
				}
				
				return $return;
			} else {
				echo $stmt->errorInfo()[2];				
				return false;
			}
		}

		public function update($sql, $values) {
			$stmt = $this->con->prepare($sql);
			
			for($i = 0; $i < count($values); $i++) {
				$stmt->bindParam($i + 1, $values[$i]);
			}
						
			if($stmt->execute()) {
				return true;
			} else {
				echo $stmt->errorInfo()[2];								
				return false;
			}
		}

		public function delete($sql, $values) {
			$stmt = $this->con->prepare($sql);
			
			for($i = 0; $i < count($values); $i++) {
				$stmt->bindParam($i + 1, $values[$i]);
			}
						
			if($stmt->execute()) {
				return true;
			} else {
				echo $stmt->errorInfo()[2];				
				return false;
			}
		}

    }