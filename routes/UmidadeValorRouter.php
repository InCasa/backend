<?php
	global $app;

    $app->get('/umidadeValor',  function () {	
		return "umidadeValor: " . rand(0, 100);
	});
    
    $app->get('/umidadeValor/{id}',  function ($request, $response) {	
		$id = $request->getAttribute('id');
        
        $umidadeValorDAO = new UmidadeValorDAO();
        $umidadeValor = $umidadeValorDAO->getUmidadeValor($id);
        
        $json = array('id'=>$umidadeValor->getIdUmidadeValor(), 
        'valor'=>$umidadeValor->getValor(), 
        'DataHorario'=>$umidadeValor->getDataHorario(),
        'idUmidade'=>$umidadeValor->getIdUmidade());
        
		return json_encode($json);
	});
    
    $app->post('/umidadeValor', function($request, $response) {
        $umidadeValor = new UmidadeValor();
        
        $body = $request->getParsedBody();
        
        $umidadeValor->setValor($body['valor']);
        $umidadeValor->setIdUmidade($body['idUmidade']);
        
        $umidadeValorDAO = new UmidadeValorDAO();
        $umidadeValorDAO->create($umidadeValor);
        
        return $response;
    })->add($validJson);
    
    $app->put('/umidadeValor/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT umidadeValor";
    })->add($validJson);
    
    $app->delete('/umidadeValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE umidadeValor";
    });
