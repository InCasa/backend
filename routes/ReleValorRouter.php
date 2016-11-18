<?php
	global $app;

    $app->get('/releValor',  function () {	
		$releValorDAO = new ReleValorDAO();
        $releValores = array();
        $releValores = $releValorDAO->getAll();
        
        $json = array();
        foreach ($releValores as $releValor) {
            $json[] = array('id'=>$releValor->getIdReleValor(),
            'valor'=>$releValor->getValor(),
            'DataHorario'=>$releValor->getDataHorario(),
            'idRele'=>$releValor->getIdRele());
        }
        
        return json_encode($json);
	});
    
    $app->get('/releValor/{id}',  function ($request, $response) {	
		$id = $request->getAttribute('id');
        
        $releValorDAO = new ReleValorDAO();
        $releValor = $releValorDAO->getReleValor($id);
        
        $json = array('id'=>$releValor->getIdReleValor(),
        'valor'=>$releValor->getValor(),
        'DataHorario'=>$releValor->getDataHorario(),
        'idRele'=>$releValor->getIdRele());
        return json_encode($json);
	});
    
    $app->post('/releValor', function($request, $response) {
        $releValor = new ReleValor();
        
        $body = $request->getParsedBody();
        
        $releValor->setValor($body['valor']);
        $releValor->setIdRele($body['idRele']);
        
        $releValorDAO = new ReleValorDAO();
        $releValorDAO->create($releValor);
        
        return $response;
    })->add($validJson);
        
    $app->delete('/releValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE releValor";
    });
