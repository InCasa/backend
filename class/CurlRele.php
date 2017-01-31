<?php

    class CurlRele {        

        public static function ligaRele($rele) {
            $arduinoDAO = new ArduinoDAO();
            $arduino = $arduinoDAO->getArduino(1);
            switch ($rele) {
                case 1:
                    $ch = curl_init("http://".$arduino->getIP()."/?1_ligar");
                    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                    curl_exec($ch);
                    break;
                case 2:
                    $ch = curl_init("http://".$arduino->getIP()."/?2_ligar");
                    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                    curl_exec($ch);
                    break;
                case 3:
                    $ch = curl_init("http://".$arduino->getIP()."/?3_ligar");
                    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                    curl_exec($ch);
                    break;
                case 4:
                    $ch = curl_init("http://".$arduino->getIP()."/?4_ligar");
                    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                    curl_exec($ch);
                    break;    
            }
        }

        public static function desligaRele($rele) {
            $arduinoDAO = new ArduinoDAO();
            $arduino = $arduinoDAO->getArduino(1);
            switch ($rele) {
                case 1:
                    $ch = curl_init("http://".$arduino->getIP()."/?1_desligar");
                    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                    curl_exec($ch);
                    break;
                case 2:
                    $ch = curl_init("http://".$arduino->getIP()."/?2_desligar");
                    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                    curl_exec($ch);
                    break;
                case 3:
                    $ch = curl_init("http://".$arduino->getIP()."/?3_desligar");
                    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                    curl_exec($ch);
                    break;
                case 4:
                    $ch = curl_init("http://".$arduino->getIP()."/?4_desligar");
                    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                    curl_exec($ch);
                    break;    
            }
        }

    }