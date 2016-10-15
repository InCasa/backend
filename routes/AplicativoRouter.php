<?php
	global $app;

    $app->get('/aplicativo',  function () {	
		return "Rota GET aplicativo";
	});
    
    $app->get('/aplicativo/{id}',  function ($request, $response) {
        $id = $request->getAttribute('id');
        
        $aplicativoDAO = new AplicativoDAO();
        $aplicativo = $aplicativoDAO->getAplicativo($id);
        
        $json = array('id'=>$aplicativo->getIdAplicativo(), 'mac'=>$aplicativo->getMAC());
        
		return json_encode($json);
	});
    
    $app->post('/aplicativo', function($request, $response) {
        $aplicativo = new Aplicativo();
        
        $body = $request->getParsedBody();
        
        $aplicativo->setNome($body['nome']);
        $aplicativo->setMAC($body['mac']);
        
        $aplicativoDAO = new AplicativoDAO();
        $aplicativoDAO->create($aplicativo);
        
        return $response;
    })->add($validJson);
    
    $app->put('/aplicativo/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT aplicativo";
    })->add($validJson);
    
    $app->delete('/aplicativo/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE aplicativo";
    });
