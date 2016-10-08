<?php
	global $app;

    $app->get('/temperaturaValor',  function () {	
		return "temperaturaValor: " . rand(0, 100);
	});
    
    $app->get('/temperaturaValor/{id}',  function ($request, $response) {
        $id = $request->getAttribute('id');
        
        $temperaturaValorDAO = new TemperaturaValorDAO();
        $temperaturaValor = $temperaturaValorDAO->getTemperatura($id);
        
        $json = array('id'=>$temperaturaValor->getIdTemperaturaValor(), 
        'valor'=>$temperaturaValor->getValor(), 
        'DataHorario'=>$temperaturaValor->getDataHorario(),
        'idTemperatura'=>$temperaturaValor->getIdTemperatura());
        
		return json_encode($json);
	});
    
    $app->post('/temperaturaValor', function($request, $response, $args) {
        $temperaturaValor = new TemperaturaValor();
        
        $body = $request->getParsedBody();
        
        $temperaturaValor->setValor($body['valor']);
        $temperaturaValor->setDataHorario($body['DataHorario']);
        $temperaturaValor->setIdTemperatura($body['idTemperatura']);
        
        $temperaturaValorDAO = new TemperaturaValorDAO();
        $temperaturaValorDAO->create($temperaturaValor);
        
        return $response;
    })->add($validJson);
    
    $app->put('/temperaturaValor/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT temperaturaValor";
    })->add($validJson);
    
    $app->delete('/temperaturaValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE temperaturaValor";
    });
