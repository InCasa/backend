<?php

    class UmidadeValor {
        
        private $idUmidadeValor;
        private $valor;
        private $dataHorario;
        private $idUmidade;
        
        public function __construct(){
                        
        }
        
        public function getIdUmidadeValor() {
            return $this->idUmidadeValor;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getDataHorario() {
            return $this->dataHorario;
        }

        public function getIdUmidade() {
            return $this->idUmidade;
        }

        public function setIdUmidadeValor($idUmidadeValor) {
            $this->idUmidadeValor = $idUmidadeValor;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function setDataHorario($dataHorario) {
            $dataHorario = DataFormat::formatDateTime($dataHorario);
            $this->dataHorario = $dataHorario;
        }

        public function setIdUmidade($idUmidade) {
            $this->idUmidade = $idUmidade;
        }        
        
    }