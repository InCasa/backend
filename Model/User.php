<?php 
    public class User(){
        private $idUser;
        private $nome;
        private $login;
        private $senha;
        
        public function __construct($nome, $login, $senha){
            $this->nome = $nome;
            $this->login = $login;
            $this->senha = $senha;
        }
        
        public function getId(){
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
    }
