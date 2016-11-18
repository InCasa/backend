<?php
    global $app;

    $app->get('/presencaValor',  function () {			
        $presencaValorDAO = new PresencaValorDAO();
        $presencaValores = array();
        $presencaValores = $presencaValorDAO->getAll();
        
        $json = array();
        foreach ($presencaValores as $presencaValor) {
            $json[] = array('id'=>$presencaValor->getIdPresencaValor(),
            'valor'=>$presencaValor->getValor(),
            'DataHorario'=>$presencaValor->getDataHorario(),
            'idPresenca'=>$presencaValor->getIdSensorPresenca());
        }
        
        return json_encode($json);
	});
    
    $app->get('/presencaValor/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $presencaValorDAO = new PresencaValorDAO();
        $presencaValor = $presencaValorDAO->getPresencaValor($id);
        
        $json = array('id'=>$presencaValor->getIdPresencaValor(),
        'valor'=>$presencaValor->getValor(),
        'DataHorario'=>$presencaValor->getDataHorario(),
        'idPresenca'=>$presencaValor->getIdSensorPresenca());
        
        return json_encode($json);
	});    
    
    $app->post('/presencaValor', function($request, $response) {
        $presencaValor = new PresencaValor();
        
        $body = $request->getParsedBody();
        
        $presencaValor->setValor($body['valor']);
        $presencaValor->setIdSensorPresenca($body['idPresenca']);
        
        $presencaValorDAO = new PresencaValorDAO();
        $presencaValorDAO->create($presencaValor);
        
        return $response;
    })->add($validJson);
    
    $app->put('/presencaValor/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT presencaValor";
    })->add($validJson);
    
    $app->delete('/presencaValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE presencaValor";
    });
