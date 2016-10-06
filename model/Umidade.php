<?php 
    class Umidade {
        private $idUmidade;
        private $nome;
        private $descricao;              
        
        public function __construct(){
                        
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getDescricao(){
            return $this->descricao;
        }               

        public function getIdUmidade(){
            return $this->idUmidade;
        }
        
        public function setIdUmidade($idUmidade) {
            $this->idUmidade = $idUmidade;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }   
                
    }
