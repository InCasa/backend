<?php

    class CurlRele {

        public static function ligaRele($rele) {
            switch ($rele) {
                case 1:
                    $ch = curl_init("http://192.168.1.150/?1_ligar");
                    curl_exec($ch);
                    break;
                case 2:
                    $ch = curl_init("http://192.168.1.150/?2_ligar");
                    curl_exec($ch);
                    break;
                case 3:
                    $ch = curl_init("http://192.168.1.150/?3_ligar");
                    curl_exec($ch);
                    break;
                case 4:
                    $ch = curl_init("http://192.168.1.150/?4_ligar");
                    curl_exec($ch);
                    break;    
            }
        }

        public static function desligaRele($rele) {
            switch ($rele) {
                case 1:
                    $ch = curl_init("http://192.168.1.150/?1_desligar");
                    curl_exec($ch);
                    break;
                case 2:
                    $ch = curl_init("http://192.168.1.150/?2_desligar");
                    curl_exec($ch);
                    break;
                case 3:
                    $ch = curl_init("http://192.168.1.150/?3_desligar");
                    curl_exec($ch);
                    break;
                case 4:
                    $ch = curl_init("http://192.168.1.150/?4_desligar");
                    curl_exec($ch);
                    break;    
            }
        }

    }