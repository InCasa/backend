<?php
    class Arduino {
        private $idArduino;
        private $ip;
        private $MAC;
        private $gateway;
        private $mask;
        private $porta;
        private $cod;
        
        private $PinoDHT22;
        Private $PinoRele1;
        Private $PinoRele2;
        Private $PinoRele3;
        Private $PinoRele4;
        Private $PinoLDR;
        
        Public function __construct() {
            
        }
        
        public function getIP(){
            return $this->ip;
        }
        
        public function getMAC(){
            return $this->MAC;
        }
        
        public function getGateway(){
            return $this->gateway;
        }
        
        public function getMask(){
            return $this->mask;
        }
        
        public function getPinoDHT(){
            return $this->PinoDHT22;
        }
        
        public function getPinoRele1(){
            return $this->PinoRele1;
        }
        
        public function getPinoRele2(){
            return $this->PinoRele2;
        }
        
        public function getPinoRele3(){
            return $this->PinoRele3;
        }
        
        public function getPinoRele4(){
            return $this->PinoRele4;
        }
        
        public function getPinoLDR(){
            return $this->PinoLDR;
        }
        
        public function getPorta(){
            return $this->Porta;
        }

        public function getCod(){
            return $this->cod;
        }

        public function getIdArduino(){
            return $this->idArduino;
        }
		
		function setIdArduino($idArduino) {
            $this->idArduino = $idArduino;
        }

        function setIp($ip) {
            $this->ip = $ip;
        }

        function setMAC($MAC) {
            $this->MAC = $MAC;
        }

        function setGateway($gateway) {
            $this->gateway = $gateway;
        }

        function setMask($mask) {
            $this->mask = $mask;
        }

        function setPorta($porta) {
            $this->porta = $porta;
        }

        function setCod($cod) {
            $this->cod = $cod;
        }

        function setPinoDHT22($PinoDHT22) {
            $this->PinoDHT22 = $PinoDHT22;
        }

        function setPinoRele1($PinoRele1) {
            $this->PinoRele1 = $PinoRele1;
        }

        function setPinoRele2($PinoRele2) {
            $this->PinoRele2 = $PinoRele2;
        }

        function setPinoRele3($PinoRele3) {
            $this->PinoRele3 = $PinoRele3;
        }

        function setPinoRele4($PinoRele4) {
            $this->PinoRele4 = $PinoRele4;
        }

        function setPinoLDR($PinoLDR) {
            $this->PinoLDR = $PinoLDR;
        }

            
    }