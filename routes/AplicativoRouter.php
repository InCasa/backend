<?php
	global $app;

    $app->get('/aplicativo',  function ($request, $response) {	
        $aplicativoDAO = new AplicativoDAO();

        $aplicativo = $aplicativoDAO->getLast();
        
        $json = array('id'=>$aplicativo->getIdAplicativo(), 'nome'=>$aplicativo->getNome(), 'mac'=>$aplicativo->getMAC());
                
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->get('/aplicativo/{id}',  function ($request, $response) {
        $id = $request->getAttribute('id');
        
        $aplicativoDAO = new AplicativoDAO();
        $aplicativo = $aplicativoDAO->getAplicativo($id);
        
        $json = array('id'=>$aplicativo->getIdAplicativo(), 'nome'=>$aplicativo->getNome(), 'mac'=>$aplicativo->getMAC());
        
		$newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->post('/aplicativo', function($request, $response) {
        $aplicativo = new Aplicativo();
        
        $body = $request->getParsedBody();
        
        $aplicativo->setNome($body['nome']);
        $aplicativo->setMAC($body['mac']);
        
        $aplicativoDAO = new AplicativoDAO();
        $aplicativoDAO->create($aplicativo);
        
        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
        
        return $newResponse;
    })->add($validJson)->add($authBasic);
    
    $app->put('/aplicativo/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $aplicativoDAO = new AplicativoDAO();
        $aplicativo = $aplicativoDAO->getAplicativo($id);

        $aplicativo->setNome($body['nome']);
        $aplicativo->setMAC($body['mac']);

        $aplicativoDAO->update($aplicativo);

        $data = array('valido' => true);
		$newResponse = $response->withJson($data);		
		
		return $newResponse;
    })->add($validJson)->add($authBasic);
    
    $app->delete('/aplicativo/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE aplicativo";
    })->add($authBasic);
