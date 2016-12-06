<?php

    class CommandRead{
        //array destinado a receber todas as palavras para comparação dos comandos.
        private $words = array("ligar", "acender", "lampada", "lâmpada", "lampadas", "lâmpadas", "luz", "televisão", "tv", "desligar", "apagar",
        "temperatura", "umidade", "ventilador", "luminosidade", "qual", "quanto", "sala", "cozinha", "banheiro", "quarto", "suite", "lavanderia",
        "jardim","varanda", "som", "radio", "rádio");

        //função que recebe a String do comando e faz comparação com o array.
        public static function readCommand($comando){
            $comando = strtolower($comando);

        }
        
    }