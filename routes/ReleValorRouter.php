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
	})->add($authBasic);
    
    $app->get('/releValor/{id}',  function ($request, $response) {	
		$id = $request->getAttribute('id');
        
        $releValorDAO = new ReleValorDAO();
        $releValor = $releValorDAO->getLast($id);
        
        $json = array('valor'=>$releValor->getValor());
        return json_encode($json);
	})->add($authBasic);
    
    $app->post('/releValor', function($request, $response) {
        $releValor = new ReleValor();
        
        $body = $request->getParsedBody();
        
        $releValor->setValor($body['valor']);
        $releValor->setIdRele($body['idRele']);
        
        $releValorDAO = new ReleValorDAO();
        $releValorDAO->create($releValor);

        if($body['valor'] == true) {
            CurlRele::ligaRele($body['idRele']);
        } else {
            CurlRele::desligaRele($body['idRele']);
        }

        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
        
        return $newResponse;
    })->add($validJson)->add($authBasic);

    $app->put('/releValor/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $releValorDAO = new ReleValorDAO();
        $releValor = $releValorDAO->getReleValor($id);

        $releValor->setValor($body['valor']);

        $releValorDAO->update($releValor);

        return $response;
    })->add($validJson)->add($authBasic);
        
    $app->delete('/releValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE releValor";
    })->add($authBasic);
