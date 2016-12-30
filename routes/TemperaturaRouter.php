<?php
	global $app;

    $app->get('/temperatura',  function () {	
		$temperaturaDAO = new TemperaturaDAO();
        $temperaturas = array();
        $temperaturas = $temperaturaDAO->getAll();
        
        $json = array();
        foreach ($temperaturas as $temperatura) {
            $json[] = array('id'=>$temperatura->getIdTemperatura(),
            'nome'=>$temperatura->getNome(),
            'descricao'=>$temperatura->getDescricao());
        }
        
        return json_encode($json);
	})->add($authBasic);
    
    $app->get('/temperatura/{id}',  function ($request, $response) {	
		$id = $request->getAttribute('id');
        
        $temperaturaDAO = new TemperaturaDAO();
        $temperatura = $temperaturaDAO->getTemperatura($id);
        
        $json = array('id'=>$temperatura->getIdTemperatura(),
        'nome'=>$temperatura->getNome(),
        'descricao'=>$temperatura->getDescricao());
        
        return json_encode($json);
	})->add($authBasic);
    
    $app->post('/temperatura', function($request, $response) {
        $temperatura = new Temperatura();
        
        $body = $request->getParsedBody();
        
        $temperatura->setNome($body['nome']);
        $temperatura->setDescricao($body['descricao']);
        
        $temperaturaDAO = new TemperaturaDAO();
        $temperaturaDAO->create($temperatura);
        
        return $response;
    })->add($validJson)->add($authBasic);
    
    $app->put('/temperatura/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $temperaturaDAO = new TemperaturaDAO();
        $temperatura = $temperaturaDAO->getTemperatura($id);

        $temperatura->setNome($body['nome']);
        $temperatura->setDescricao($body['descricao']);

        $temperaturaDAO->update($temperatura);

        return $response;
    })->add($validJson)->add($authBasic);
    
    $app->delete('/temperatura/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE temperatura";
    })->add($authBasic);
