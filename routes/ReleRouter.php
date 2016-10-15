<?php
	global $app;
    
    $app->post('/rele', function ($request, $response) {
        $rele = new Rele();
        
        $body = $request->getParsedBody();
        
        $rele->setNome($body['nome']);
        $rele->setDescricao($body['descricao']);
        $rele->setPorta($body['porta']);
        
        $releDAO = new ReleDAO();
        $releDAO->create($rele);
        
        return $response;
    })->add($validJson);
    
    $app->get('/rele/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $releDAO = new ReleDAO();
        $rele = $releDAO->getRele($id);
        
        $json = array('id'=>$rele->getIdRele(),
        'nome'=>$rele->getNome(),
        'descricao'=>$rele->getDescricao(),
        'porta'=>$rele->getPorta());
        
        return json_encode($json);
	});
    
    $app->put('/rele/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT Rele";
    })->add($validJson);
    
    $app->delete('/rele/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE Rele";
    });
