<?php
    class LuminosidadeValor {
        
        private $idLuminosidadeValor;
        private $valor;
        private $dataHorario;
        private $idSensorLuminosidade;
        
        public function __construct() {
			
		}
        
        public function getIdLuminosidadeValor() {
            return $this->idLuminosidadeValor;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getDataHorario() {
            return $this->dataHorario;
        }

        public function getIdSensorLuminosidade() {
            return $this->idSensorLuminosidade;
        }

        public function setIdLuminosidadeValor($idLuminosidadeValor) {
            $this->idLuminosidadeValor = $idLuminosidadeValor;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function setDataHorario($dataHorario) {
            $this->dataHorario = $dataHorario;
        }

        public function setIdSensorLuminosidade($idSensorLuminosidade) {
            $this->idSensorLuminosidade = $idSensorLuminosidade;
        }
        
        
        
        
        
    }