<?php
    global $app;

    $app->get('/luminosidadeValor',  function () {			
        $luminosidadeValorDAO = new LuminosidadeValorDAO();
        
        $luminosidadeValor = $luminosidadeValorDAO->getLast();
		
        $json = array('valor'=>$luminosidadeValor->getValor());
                
        return json_encode($json);
	})->add($authBasic);
    
    $app->get('/luminosidadeValor/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $luminosidadeValorDAO = new LuminosidadeValorDAO();
        $luminosidadeValor = $luminosidadeValorDAO->getLuminosidadeValor($id);
        
        $json = array('id'=>$luminosidadeValor->getIdLuminosidadeValor(),
        'valor'=>$luminosidadeValor->getValor(),
        'DataHorario'=>$luminosidadeValor->getDataHorario(),
        'idLuminosidade'=>$luminosidadeValor->getIdSensorLuminosidade());
        
        return json_encode($json);
	})->add($authBasic);    
    
    $app->post('/luminosidadeValor', function($request, $response) {
        $luminosidadeValor = new LuminosidadeValor();
        
        $body = $request->getParsedBody();
        
        $luminosidadeValor->setValor($body['valor']);
        $luminosidadeValor->setIdSensorLuminosidade($body['idLuminosidade']);
        
        $luminosidadeValorDAO = new LuminosidadeValorDAO();
        $luminosidadeValorDAO->create($luminosidadeValor);
        
        return $response;
    })->add($validJson)->add($authBasic);
    
    $app->put('/luminosidadeValor/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT luminosidadeValor";
    })->add($validJson)->add($authBasic);
    
    $app->delete('/luminosidadeValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE luminosidadeValor";
    })->add($authBasic);
