<?php
    class Rele {
        private $idRele;
        private $nome;
        private $porta;
        private $descricao;
        
        public function __construct(){
                    
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getPorta(){
            return $this->porta;
        }
        
        public function getDescricao(){
            return $this->descricao;
        }

        public function getIdRele(){
            return $this->idRele;
        }
        
        public function setIdRele($idRele) {
            $this->idRele = $idRele;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setPorta($porta) {
            $this->porta = $porta;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }
        
    }
