<?php
    global $app;

    $app->get('/presencaValor',  function ($request, $response) {			
        $presencaValorDAO = new PresencaValorDAO();

        $arduinoDAO = new ArduinoDAO();
        $arduino = $arduinoDAO->getArduino(1);

        //configura a requesição do PHP para o arduino com timeout.
        $opts = array('http' =>array('method'  => 'GET','timeout' => 1));
        $context  = stream_context_create($opts);
        $jsonPresencaValor = file_get_contents("http://".$arduino->getIP()."/?movimento", false, $context);
        $movimento = json_decode($jsonPresencaValor, true);
        //criar objeto que salva o movimento no banco de dados.
        $presencaValor = new PresencaValor();
        $presencaValor->setValor($movimento["valor"]);
        $presencaValor->setIdSensorPresenca(1);
        $presencaValorDAO->create($presencaValor);
        
        $presencaValor = $presencaValorDAO->getLast();
		
        $json = array('valor'=>$presencaValor->getValor());
                
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);

    $app->get('/presencaValorNow',  function ($request, $response) {	
        //esse metodo vai retornar apenas o valor direto do arduino, so salva caso o valor seja true;		
        $presencaValorDAO = new PresencaValorDAO();

        $arduinoDAO = new ArduinoDAO();
        $arduino = $arduinoDAO->getArduino(1);

        //configura a requesição do PHP para o arduino com timeout.
        $opts = array('http' =>array('method'  => 'GET','timeout' => 1));
        $context  = stream_context_create($opts);
        $jsonPresencaValor = file_get_contents("http://".$arduino->getIP()."/?movimento", false, $context);
        $movimento = json_decode($jsonPresencaValor, true); 

        if($movimento["valor"] == 1){
            $presencaValor = new PresencaValor();
            $presencaValor->setValor($movimento["valor"]);
            $presencaValor->setIdSensorPresenca(1);
            $presencaValorDAO->create($presencaValor);
        }       
		
        $json = array('valor'=>$movimento["valor"]);
                
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->get('/presencaValor/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $presencaValorDAO = new PresencaValorDAO();
        $presencaValor = $presencaValorDAO->getPresencaValor($id);
        
        $json = array('id'=>$presencaValor->getIdPresencaValor(),
        'valor'=>$presencaValor->getValor(),
        'DataHorario'=>$presencaValor->getDataHorario(),
        'idPresenca'=>$presencaValor->getIdSensorPresenca());
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);    
    
    $app->post('/presencaValor', function($request, $response) {
        $presencaValor = new PresencaValor();
        
        $body = $request->getParsedBody();
        
        $presencaValor->setValor($body['valor']);
        $presencaValor->setIdSensorPresenca($body['idPresenca']);
        
        $presencaValorDAO = new PresencaValorDAO();
        $presencaValorDAO->create($presencaValor);
        
        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
        
        return $newResponse;
    })->add($validJson)->add($authBasic);

