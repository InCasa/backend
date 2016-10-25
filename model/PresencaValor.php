<?php
    class PresencaValor {
        
        private $idPresencaValor;
        private $valor;
        private $dataHorario;
        private $idSensorPresenca;
        
        public function __construct() {
			
		}
        
        public function getIdPresencaValor() {
            return $this->idPresencaValor;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getDataHorario() {
            return $this->dataHorario;
        }

        public function getIdSensorPresenca() {
            return $this->idSensorPresenca;
        }

        public function setIdPresencaValor($idPresencaValor) {
            $this->idPresencaValor = $idPresencaValor;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function setDataHorario($dataHorario) {
            $this->dataHorario = $dataHorario;
        }

        public function setIdSensorPresenca($idSensorPresenca) {
            $this->idSensorPresenca = $idSensorPresenca;
        }
                                        
    }