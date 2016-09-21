<?php 
    class Umidade {
        private $idUmidade;
        private $nome;
        private $descricao;
        private $valor;        
        
        public function __construct(){
                        
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getDescricao(){
            return $this->descricao;
        }
        
        public function getValor(){
            return $this->valor;
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

        public function setValor($valor) {
            $this->valor = $valor;
        }


                
    }
