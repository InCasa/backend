<?php
    global $app;

    $app->get('/luminosidadeValor',  function () {			
        $luminosidadeValorDAO = new LuminosidadeValorDAO();
        $luminosidadeValores = array();
        $luminosidadeValores = $luminosidadeValorDAO->getAll();
        
        $json = array();
        foreach ($luminosidadeValores as $luminosidadeValor) {
            $json[] = array('id'=>$luminosidadeValor->getIdLuminosidadeValor(),
            'valor'=>$luminosidadeValor->getValor(),
            'DataHorario'=>$luminosidadeValor->getDataHorario(),
            'idLuminosidade'=>$luminosidadeValor->getIdSensorLuminosidade());
        }
        
        return json_encode($json);
	});
    
    $app->get('/luminosidadeValor/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $luminosidadeValorDAO = new LuminosidadeValorDAO();
        $luminosidadeValor = $luminosidadeValorDAO->getLuminosidadeValor($id);
        
        $json = array('id'=>$luminosidadeValor->getIdLuminosidadeValor(),
        'valor'=>$luminosidadeValor->getValor(),
        'DataHorario'=>$luminosidadeValor->getDataHorario(),
        'idLuminosidade'=>$luminosidadeValor->getIdSensorLuminosidade());
        
        return json_encode($json);
	});    
    
    $app->post('/luminosidadeValor', function($request, $response) {
        $luminosidadeValor = new LuminosidadeValor();
        
        $body = $request->getParsedBody();
        
        $luminosidadeValor->setValor($body['valor']);
        $luminosidadeValor->setIdSensorLuminosidade($body['idLuminosidade']);
        
        $luminosidadeValorDAO = new LuminosidadeValorDAO();
        $luminosidadeValorDAO->create($luminosidadeValor);
        
        return $response;
    })->add($validJson);
    
    $app->put('/luminosidadeValor/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT luminosidadeValor";
    })->add($validJson);
    
    $app->delete('/luminosidadeValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE luminosidadeValor";
    });
