<?php 
    class User {
        private $idUser;
        private $nome;
        private $login;
        private $senha;
        
        public function __construct(){
            
        }
        
        public function getIdUser(){
            return $this->idUser;
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getLogin(){
            return $this->login;
        }
        
        public function getSenha(){
            return $this->senha;
        }
        
        public function setIdUser($idUser) {
            $this->idUser = $idUser;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setLogin($login) {
            $this->login = $login;
        }

        public function setSenha($senha) {
            $this->senha = crypt($senha, "$2a$08$" . substr(sha1(mt_rand()), 0, 22) ."$");
        }
        
    }
