<?php

    class CommandRead{
        
        //função que recebe a String do comando e faz uma tomada de decisao para realização do comando.
        public static function readCommand($comando){
            $comando = strtolower($comando);
            $Vcomando = explode(" ",$comando);
            
            $conjucoes = array("a", "as", "o", "os", "do", "da");
            $actions = array("ligar", "desligar", "acender", "apagar");
            $objects = array("lampada", "lâmpada", "tv", "televisão", "luz", "ventilador", "lampadas", "lâmpadas");

            $Vcomando = array_diff($Vcomando, $conjucoes);

            $string = implode(" ", $Vcomando);
            $parsedCommand = explode(" ", $string);

            //**Apagar esse var_dump depois**
            var_dump($parsedCommand);

            $releDAO = new ReleDAO();
            $temperaturaDAO = new TemperaturaDAO();
            $umidadeDAO = new UmidadeDAO();

            $arduinoDAO = new ArduinoDAO();
            $arduino = $arduinoDAO->getArduino(1);

            //parte destinada a realizar ação com o rele.
            //identifca a ação
            if(array_diff($parsedCommand, $actions)){
               
                //identifica o objeto
                if(array_diff($parsedCommand, $objects)){
                  //  print("foi a objeto");

                    $reles = $releDAO->getAll();
                    foreach ($reles as $rele) {
                        //identifica o local
                        if(in_array(strtolower($rele->getNome()), $parsedCommand)){

                            //configura a requesição do PHP para o arduino com timeout.
                            $opts = array('http' =>array('method'  => 'GET','timeout' => 2));
                            $context  = stream_context_create($opts);

                            //recebe o valor do rele
                            $jsonReleValor = file_get_contents("http://".$arduino->getIP()."/?rele/".$rele->getIdRele(), false, $context);
                            $releStatus = json_decode($jsonReleValor, true); 
                           var_dump($releStatus);
                            //realizar ação do rele, ligar ou desligar.
                            if(in_array("ligar", $parsedCommand) or in_array("acender", $parsedCommand) ){
                                
                                if($releStatus['valor'] == false){
                                    $json = array('valor'=> "ja ligado!");
                                    return $json;
                                    
                                }else{
                                    CurlRele::ligaRele($rele->getIdRele());

                                    $releValor = new ReleValor(); 
                                    $releValor->setValor($releStatus['valor']);
                                    $releValor->setIdRele($rele->getIdRele());
                                    
                                    $releValorDAO = new ReleValorDAO();
                                    $releValorDAO->create($releValor);

                                    $json = array('valor'=>$releValor->getValor());
                                    return json_encode($json);
                                }
                                
                                
                            }

                            if(in_array("desligar", $parsedCommand) or in_array("apagar", $parsedCommand) ){
                                
                                if($releStatus['valor'] == true){
                                    $json = array('valor'=> "ja desligado!");
                                    return $json;
                                    
                                }else{
                                    CurlRele::desligaRele($rele->getIdRele());

                                    $releValor = new ReleValor(); 
                                    $releValor->setValor($releStatus['valor']);
                                    $releValor->setIdRele($rele->getIdRele());
                                    
                                    $releValorDAO = new ReleValorDAO();
                                    $releValorDAO->create($releValor);

                                    $json = array('valor'=>$releValor->getValor());
                                    return json_encode($json);
                                }

                                
                            }
                            
                        }
                    }
                }            

            }

            //parte destinada a realizar ação com o sensor de temperatura e umidade.
            //identifica a pergunta.
            if(in_array("qual", $parsedCommand)){
               
                //verifica se é temperatura ou umidade
                if(in_array("temperatura", $parsedCommand)){
                   
                    $temperaturas = $temperaturaDAO->getAll();
                    foreach($temperaturas as $temperatura){
                        //identifica o local
                        if(in_array(strtolower($temperatura->getNome()), $parsedCommand)){
                            
                            //ação para pegar o valor da temperatura
                            $temperaturaValorDAO = new TemperaturaValorDAO();
                            //configura a requesição do PHP para o arduino com timeout.
                            $opts = array('http' =>array('method'  => 'GET','timeout' => 1));
                            $context  = stream_context_create($opts);
                            $jsonTempValor = file_get_contents("http://".$arduino->getIP()."/?temperatura", false, $context);
                            $temp = json_decode($jsonTempValor, true);
                            //criar objeto que salva a temperatura no banco de dados.
                            $temperaturaValorTemp = new TemperaturaValor();
                            $temperaturaValorTemp->setValor($temp["valor"]);
                            $temperaturaValorTemp->setIdTemperatura(1);
                            $temperaturaValorDAO->create($temperaturaValorTemp);
                            
                            $temperaturaValor = $temperaturaValorDAO->getLast();
                            
                            $json = array('valor'=>$temperaturaValor->getValor());
                            return $json;
                        }
                    }
                }
            }
            
               if(in_array("umidade", $parsedCommand)){
                    
                    $umidades = $umidadeDAO->getAll();
                    foreach($umidades as $umidade){
                        //identifica o local
                        if(in_array(strtolower($umidade->getNome()), $parsedCommand)){
                           
                            //ação para pegar o valor da umidade
                            $umidadeValorDAO = new UmidadeValorDAO();
                            //configura a requesição do PHP para o arduino com timeout.
                            $opts = array('http' =>array('method'  => 'GET','timeout' => 1));
                            $context  = stream_context_create($opts);
                            $jsonUmidadeValor = file_get_contents("http://".$arduino->getIP()."/?umidade", false, $context);
                            $umi = json_decode($jsonUmidadeValor, true);
                            //criar objeto que salva a umidade no banco de dados.
                            $umidadeValor = new UmidadeValor();
                            $umidadeValor->setValor($umi["valor"]);
                            $umidadeValor->setIdUmidade(1);
                            $umidadeValorDAO->create($umidadeValor);
                            
                            $umidadeValor = $umidadeValorDAO->getLast();
                            
                            $json = array('valor'=>$umidadeValor->getValor());
                            return $json;
                        }
                    }
                }else{
                $json = array('valor'=> "Comando invalido ou nao existente");
                return $json;
                }

                //fim do método.
            }

        
        }
        