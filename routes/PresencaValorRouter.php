<?php
    global $app;

    $app->get('/presencaValor',  function () {			
        $presencaValorDAO = new PresencaValorDAO();
        
        $presencaValor = $presencaValorDAO->getLast();
		
        $json = array('valor'=>$presencaValor->getValor());
                
        return json_encode($json);
	})->add($authBasic);
    
    $app->get('/presencaValor/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $presencaValorDAO = new PresencaValorDAO();
        $presencaValor = $presencaValorDAO->getPresencaValor($id);
        
        $json = array('id'=>$presencaValor->getIdPresencaValor(),
        'valor'=>$presencaValor->getValor(),
        'DataHorario'=>$presencaValor->getDataHorario(),
        'idPresenca'=>$presencaValor->getIdSensorPresenca());
        
        return json_encode($json);
	})->add($authBasic);    
    
    $app->post('/presencaValor', function($request, $response) {
        $presencaValor = new PresencaValor();
        
        $body = $request->getParsedBody();
        
        $presencaValor->setValor($body['valor']);
        $presencaValor->setIdSensorPresenca($body['idPresenca']);
        
        $presencaValorDAO = new PresencaValorDAO();
        $presencaValorDAO->create($presencaValor);
        
        return $response;
    })->add($validJson)->add($authBasic);
    
    $app->put('/presencaValor/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT presencaValor";
    })->add($validJson)->add($authBasic);
    
    $app->delete('/presencaValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE presencaValor";
    })->add($authBasic);
