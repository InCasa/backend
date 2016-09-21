<?php 
     class Aplicativo {
        private $idAplicativo;
        private $nome;
        private $MAC;
                
        public function __construct() {
            
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getMAC(){
            return $this->mac;
        }

        public function getIdAplicativo(){
            return $this->idAplicativo;
        }
        
		function setIdAplicativo($idAplicativo) {
            $this->idAplicativo = $idAplicativo;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setMAC($MAC) {
            $this->MAC = $MAC;
        }
		
    }
