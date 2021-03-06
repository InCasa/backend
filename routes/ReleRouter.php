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
        
        $data = array('valido' => true);
		$newResponse = $response->withJson($data);		
		
		return $newResponse; 
    })->add($validJson)->add($authBasic);

    $app->get('/rele',  function ($request, $response) {			
                
        $releDAO = new ReleDAO();
        $reles = array();
        $reles = $releDAO->getAll();
        
        $json = array();
        foreach ($reles as $rele) {
            $json[] = array('id'=>$rele->getIdRele(),
            'nome'=>$rele->getNome(),
            'descricao'=>$rele->getDescricao(),
            'porta'=>$rele->getPorta());
        }
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->get('/rele/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $releDAO = new ReleDAO();
        $rele = $releDAO->getRele($id);
        
        $json = array('id'=>$rele->getIdRele(),
        'nome'=>$rele->getNome(),
        'descricao'=>$rele->getDescricao(),
        'porta'=>$rele->getPorta());
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->put('/rele/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $releDAO = new ReleDAO();
        $rele = $releDAO->getRele($id);

        $rele->setNome($body['nome']);
        $rele->setDescricao($body['descricao']);
        $rele->setPorta($body['porta']);

        $releDAO->update($rele);

        $data = array('valido' => true);
		$newResponse = $response->withJson($data);		
		
		return $newResponse; 
    })->add($validJson)->add($authBasic);
    
    $app->delete('/rele/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE Rele";
    })->add($authBasic);
