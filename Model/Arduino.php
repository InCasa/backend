<?php
    class Arduino {
        private $idArduino;
        private $ip;
        private $MAC;
        private $gateway;
        private $mask;
        private $Porta;
        private $cod;
        
        private $PinoDHT22;
        Private $PinoRele1;
        Private $PinoRele2;
        Private $PinoRele3;
        Private $PinoRele4;
        Private $PinoLDR;
        
        Public function __construct($ip, $MAC, $gateway, $mask, $PinoDHT22, $PinoRele1, $PinoRele2, $PinoRele3, $PinoRele4, $PinoLDR, $Porta, $cod){
            $this->ip = $ip;
            $this->MAC = $MAC;
            $this->gateway = $gateway;
            $this->mask = $mask;
            $this->porta = $porta;
            $this->cod = $cod;
            
            $this->PinoDHT22 = $PinoDHT22;
            $this->PinoRele1 = $PinoRele1;
            $this->PinoRele2 = $PinoRele2;
            $this->PinoRele3 = $PinoRele3;
            $this->PinoRele4 = $PinoRele4;
            $this->PinoLDR = $PinoLDR;
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
            return $this->porta;
        }

        public function getCod(){
            return $this->cod;
        }

        public function getIdArduino(){
            return $this->idArduino;
        }
            
    }