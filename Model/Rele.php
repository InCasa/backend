<?php

    public class Rele{
        private $nome;
        private $porta;
        private $descricao;
        
        public function __construct($nome, $porta, $descricao){
            $this->nome = $nome;
            $this->porta = $porta;
            $this->descricao = $descricao;        
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
    
    }
