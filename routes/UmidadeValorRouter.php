<?php
	global $app;

    $app->get('/umidadeValor',  function ($request, $response) {	
		$umidadeValorDAO = new UmidadeValorDAO();

        $arduinoDAO = new ArduinoDAO();
        $arduino = $arduinoDAO->getArduino(1);

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
                
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);

    $app->get('/umidadeValorDetails',  function ($request, $response) {	
		$umidadeValorDAO = new UmidadeValorDAO();
        $umidadeValores = array();
        $umidadeValores = $umidadeValorDAO->getAll();
        
        $json = array();
        foreach ($umidadeValores as $umidadeValor) {
            $json[] = array('id'=>$umidadeValor->getIdUmidadeValor(), 
            'valor'=>$umidadeValor->getValor(), 
            'DataHorario'=>$umidadeValor->getDataHorario(),
            'idUmidade'=>$umidadeValor->getIdUmidade());
        }
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->get('/umidadeValor/{id}',  function ($request, $response) {	
		$id = $request->getAttribute('id');
        
        $umidadeValorDAO = new UmidadeValorDAO();
        $umidadeValor = $umidadeValorDAO->getUmidadeValor($id);
        
        $json = array('id'=>$umidadeValor->getIdUmidadeValor(), 
        'valor'=>$umidadeValor->getValor(), 
        'DataHorario'=>$umidadeValor->getDataHorario(),
        'idUmidade'=>$umidadeValor->getIdUmidade());
        
		$newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->post('/umidadeValor', function($request, $response) {
        $umidadeValor = new UmidadeValor();
        
        $body = $request->getParsedBody();
        
        $umidadeValor->setValor($body['valor']);
        $umidadeValor->setIdUmidade($body['idUmidade']);
        
        $umidadeValorDAO = new UmidadeValorDAO();
        $umidadeValorDAO->create($umidadeValor);
        
        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
        
        return $newResponse;
    })->add($validJson)->add($authBasic);
        
