<?php 
     class Aplicativo {
        private $idAplicativo;
        private $nome;
        private $MAC;
                
        public function __construct($nome, $MAC){
            $this->nome = $nome;
            $this->mac = $MAC;
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getMAC(){
            return $this->mac;
        }
        
        //function CRUD
        public function create() {
            
        }

        public function update() {
            
        }

        public function delete() {
            
        }

        public function getAplicativo() {
            
        }

    }
