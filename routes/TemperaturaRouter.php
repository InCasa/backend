<?php
	global $app;

    $app->get('/temperatura',  function () {	
		return "Temperatura: " . rand(0, 100);
	});
    
    $app->get('/temperatura/{id}',  function ($request, $response) {	
		$id = $request->getAttribute('id');
        
        $temperaturaDAO = new TemperaturaDAO();
        $temperatura = $temperaturaDAO->getTemperatura($id);
        
        $json = array('id'=>$temperatura->getIdTemperatura(),
        'nome'=>$temperatura->getNome(),
        'descricao'=>$temperatura->getDescricao());
        
        return json_encode($json);
	});
    
    $app->post('/temperatura', function($request, $response) {
        $temperatura = new Temperatura();
        
        $body = $request->getParsedBody();
        
        $temperatura->setNome($body['nome']);
        $temperatura->setDescricao($body['descricao']);
        
        $temperaturaDAO = new TemperaturaDAO();
        $temperaturaDAO->create($temperatura);
        
        return $response;
    })->add($validJson);
    
    $app->put('/temperatura/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $temperaturaDAO = new TemperaturaDAO();
        $temperatura = $temperaturaDAO->getTemperatura($id);

        $temperatura->setNome($body['nome']);
        $temperatura->setDescricao($body['descricao']);

        $temperaturaDAO->update($temperatura);

        return $response;
    })->add($validJson);
    
    $app->delete('/temperatura/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE temperatura";
    });
