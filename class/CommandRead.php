<?php

    class CommandRead{
        
        //função que recebe a String do comando e faz uma tomada de decisao para realização do comando.
        public static function readCommand($comando){
            $comando = strtolower($comando);
            $Vcomando = explode(" ",$comando);
            
            $conjucoes = array("a", "as", "o", "os", "do", "da");
            $actions = array("ligar", "desligar", "acender", "apagar");
            $objects = array("lampada", "lâmpada", "tv", "televisão", "luz", "ventilador");

            $Vcomando = array_diff($Vcomando, $conjucoes);

            $string = implode(" ", $Vcomando);
            $parsedCommand = explode(" ", $string);

            //**Apagar esse var_dump depois**
            var_dump($parsedCommand);

            $releDAO = new ReleDAO();
            $temperaturaDAO = new TemperaturaDAO();
            $umidadeDAO = new UmidadeDAO();

            //parte destinada a realizar ação com o rele.
            //identifca a ação
            if(array_diff($parsedCommand, $actions)){
                print("foi a ação");
                //identifica o objeto
                if(array_diff($parsedCommand, $objects)){
                    print("foi a objeto");

                    $reles = $releDAO->getAll();
                    foreach ($reles as $rele) {
                        //identifica o local
                        if(in_array(strtolower($rele->getNome()), $parsedCommand)){
                            print("foi local");
                            //realizar ação do rele, ligar ou desligar.
                        }
                    }
                }
            }

            //parte destinada a realizar ação com o sensor de temperatura e umidade.
            //identifica a pergunta.
            if(in_array("qual", $parsedCommand)){
                print("foi a pergunta");

                //verifica se é temperatura ou umidade
                if(in_array("temperatura", $parsedCommand)){
                    print("foi a temperatura");
                    $temperaturas = $temperaturaDAO->getAll();
                    foreach($temperaturas as $temperatura){
                        //identifica o local
                        if(in_array(strtolower($temperatura->getNome()), $parsedCommand)){
                            print("foi local");
                            //ação para pegar o valor da temperatura
                        }
                    }
                }
                if(in_array("umidade", $parsedCommand)){
                    print("foi a umidade");
                    $umidades = $umidadeDAO->getAll();
                    foreach($umidades as $umidade){
                        //identifica o local
                        if(in_array(strtolower($umidade->getNome()), $parsedCommand)){
                            print("foi local");
                            //ação para pegar o valor da umidade
                        }
                    }
                }
            }

        //fim do método.
        }
        
    }