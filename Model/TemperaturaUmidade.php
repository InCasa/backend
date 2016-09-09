<?php 
    public class sensorTempUmi(){
        private $nome;
        private $descricao;
        private $temperatura;
        private $umidade;
        
        public function __construct($nome, $descricao, $temperatura, $umidade){
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->temperatura = $temperatura;
            $this->umidade = $umidade;
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getDescricao(){
            return $this->descricao;
        }
        
        public function getTemperatura(){
            return $this->temperatura;
        }
        
        public function getUmidade(){
            return $this->umidade;
        }
    }
