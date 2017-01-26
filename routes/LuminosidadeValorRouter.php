<?php
    global $app;

    $app->get('/luminosidadeValor',  function ($request, $response) {			
        $luminosidadeValorDAO = new LuminosidadeValorDAO();

        $arduinoDAO = new ArduinoDAO();
        $arduino = $arduinoDAO->getArduino(1);

        //configura a requesição do PHP para o arduino com timeout.
        $opts = array('http' =>array('method'  => 'GET','timeout' => 1));
        $context  = stream_context_create($opts);
        $jsonLuminosidadeValor = file_get_contents("http://".$arduino->getIP()."/?luminosidade", false, $context);
        $lumi = json_decode($jsonLuminosidadeValor, true);
        //criar objeto que salva a luminosidade no banco de dados.
        $luminosidadeValor = new LuminosidadeValor();
        $luminosidadeValor->setValor($lumi["valor"]);
        $luminosidadeValor->setIdSensorLuminosidade(1);
        $luminosidadeValorDAO->create($luminosidadeValor);
        
        $luminosidadeValor = $luminosidadeValorDAO->getLast();
		
        $json = array('valor'=>$luminosidadeValor->getValor());
                
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->get('/luminosidadeValor/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $luminosidadeValorDAO = new LuminosidadeValorDAO();
        $luminosidadeValor = $luminosidadeValorDAO->getLuminosidadeValor($id);
        
        $json = array('id'=>$luminosidadeValor->getIdLuminosidadeValor(),
        'valor'=>$luminosidadeValor->getValor(),
        'DataHorario'=>$luminosidadeValor->getDataHorario(),
        'idLuminosidade'=>$luminosidadeValor->getIdSensorLuminosidade());
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);    
    
    $app->post('/luminosidadeValor', function($request, $response) {
        $luminosidadeValor = new LuminosidadeValor();
        
        $body = $request->getParsedBody();
        
        $luminosidadeValor->setValor($body['valor']);
        $luminosidadeValor->setIdSensorLuminosidade($body['idLuminosidade']);
        
        $luminosidadeValorDAO = new LuminosidadeValorDAO();
        $luminosidadeValorDAO->create($luminosidadeValor);
        
        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
        
        return $newResponse;
    })->add($validJson)->add($authBasic);

