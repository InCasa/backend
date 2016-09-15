<?php 
    public class sensorUmidade(){
        private $nome;
        private $descricao;
        private $valor;        
        
        public function __construct($nome, $descricao, $valor){
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->valor = $valor;            
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
                
    }
