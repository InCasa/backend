<?php
	global $app;

    $app->get('/temperaturaValor',  function ($request, $response) {	
		$temperaturaValorDAO = new TemperaturaValorDAO();
        
        $arduinoDAO = new ArduinoDAO();
        $arduino = $arduinoDAO->getArduino(1);

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
                
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);

    $app->get('/temperaturaValorDetails',  function ($request, $response) {	
		$temperaturaValorDAO = new TemperaturaValorDAO();
        $temperaturaValores = array();
        $temperaturaValores = $temperaturaValorDAO->getAll();
        
        $json = array();
        foreach ($temperaturaValores as $temperaturaValor) {
            $json[] = array('id'=>$temperaturaValor->getIdTemperaturaValor(), 
            'valor'=>$temperaturaValor->getValor(), 
            'DataHorario'=>$temperaturaValor->getDataHorario(),
            'idTemperatura'=>$temperaturaValor->getIdTemperatura());
        }
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->get('/temperaturaValor/{id}',  function ($request, $response) {
        $id = $request->getAttribute('id');
        
        $temperaturaValorDAO = new TemperaturaValorDAO();
        $temperaturaValor = $temperaturaValorDAO->getTemperaturaValor($id);
        
        $json = array('id'=>$temperaturaValor->getIdTemperaturaValor(), 
        'valor'=>$temperaturaValor->getValor(), 
        'DataHorario'=>$temperaturaValor->getDataHorario(),
        'idTemperatura'=>$temperaturaValor->getIdTemperatura());
        
		$newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->post('/temperaturaValor', function($request, $response, $args) {
        $temperaturaValor = new TemperaturaValor();
        
        $body = $request->getParsedBody();
        
        $temperaturaValor->setValor($body['valor']);
        $temperaturaValor->setIdTemperatura($body['idTemperatura']);
        
        $temperaturaValorDAO = new TemperaturaValorDAO();
        $temperaturaValorDAO->create($temperaturaValor);
        
        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
        
        return $newResponse;
    })->add($validJson)->add($authBasic);
    