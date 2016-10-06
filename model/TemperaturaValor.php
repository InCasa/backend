<?php

    class TemperaturaValor {
        
        private $idTemperaturaValor;
        private $valor;
        private $dataHorario;
        private $idTemperatura;
        
        public function __construct(){
                        
        }
        
        public function getIdTemperaturaValor() {
            return $this->idTemperaturaValor;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getDataHorario() {
            return $this->dataHorario;
        }

        public function getIdTemperatura() {
            return $this->idTemperatura;
        }

        public function setIdTemperaturaValor($idTemperaturaValor) {
            $this->idTemperaturaValor = $idTemperaturaValor;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function setDataHorario($dataHorario) {
            $this->dataHorario = $dataHorario;
        }

        public function setIdTemperatura($idTemperatura) {
            $this->idTemperatura = $idTemperatura;
        }
        
        
    }