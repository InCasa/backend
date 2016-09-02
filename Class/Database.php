<?php
    class database {

        private $DBHOST = 'localhost';
		private $DBPORT = '3306';
		private $DBNAME = 'InCasa';
		private $DBUSER = 'root';
		private $DBPASS = '';
		private $con;
		
		// Cria uma conexão ao banco de dados		
		public function __construct() {						
			$opcoes = array(
			    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
			);
			
			$this->con = new PDO('mysql:host=' . $this->DBHOST . ';dbname='.$this->DBNAME, $this->DBUSER, $this->DBPASS, $opcoes);
		}


    }



?>

