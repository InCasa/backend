<?php

    class CommandRead{
        
        //função que recebe a String do comando e faz uma tomada de decisao para realização do comando.
        public static function readCommand($comando){
            $comando = strtolower($comando);
            $Vcomando = explode(" ",$comando);
            
            $conjucoes = array("a", "as", "o", "os");

            $Vcomando = array_diff($Vcomando, $conjucoes);

            $string = implode(" ", $Vcomando);
            $parsedCommand = explode(" ", $string);

            var_dump($parsedCommand);
            //identifca a ação
            if($VcomaparsedCommandndo[0] == "ligar"){
                print("foi a ação");
                //identifica o objeto
                if($parsedCommand[1] == "lampada"){
                    print("foi a lampada");
                }
            }

        }
        
    }