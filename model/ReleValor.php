<?php

    class ReleValor {
        
        private $idReleValor;
        private $valor;
        private $dataHorario;
        private $idRele;
        
        public function __construct(){
                    
        }
        
        public function getIdReleValor() {
            return $this->idReleValor;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getDataHorario() {
            return $this->dataHorario;
        }

        public function getIdRele() {
            return $this->idRele;
        }

        public function setIdReleValor($idReleValor) {
            $this->idReleValor = $idReleValor;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function setDataHorario($dataHorario) {
            $dataHorario = DataFormat::formatDateTime($dataHorario);
            $this->dataHorario = $dataHorario;
        }

        public function setIdRele($idRele) {
            $this->idRele = $idRele;
        }
        
        
    }