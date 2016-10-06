<?php
    class Database {

        private static $DBHOST = 'localhost';
		private static $DBPORT = '3306';
		private static $DBNAME = 'InCasa';
		private static $DBUSER = 'root';
		private static $DBPASS = '';
		private static $con;
					
		public static function getInstancia() {	
            if(!isset(self::$con)) {
                $opcoes = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
                );
                
                self::$con = new PDO('mysql:host=' . self::$DBHOST . ';dbname='.self::$DBNAME, self::$DBUSER, self::$DBPASS, $opcoes);					
            }
            
            return self::$con;
		}
        
    }