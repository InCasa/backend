<?php
	global $app;

    $app->get('/aplicativo',  function () {	
        $aplicativoDAO = new AplicativoDAO();
        $aplicativos = array();
        $aplicativos = $aplicativoDAO->getAll();
        
        $json = array();
        foreach ($aplicativos as $aplicativo) {
            $json[] = array('id'=>$aplicativo->getIdAplicativo(),
            'nome'=>$aplicativo->getNome(),
            'mac'=>$aplicativo->getMAC());
        }
        
        return json_encode($json);
	})->add($authBasic);
    
    $app->get('/aplicativo/{id}',  function ($request, $response) {
        $id = $request->getAttribute('id');
        
        $aplicativoDAO = new AplicativoDAO();
        $aplicativo = $aplicativoDAO->getAplicativo($id);
        
        $json = array('id'=>$aplicativo->getIdAplicativo(), 'mac'=>$aplicativo->getMAC());
        
		return json_encode($json);
	})->add($authBasic);
    
    $app->post('/aplicativo', function($request, $response) {
        $aplicativo = new Aplicativo();
        
        $body = $request->getParsedBody();
        
        $aplicativo->setNome($body['nome']);
        $aplicativo->setMAC($body['mac']);
        
        $aplicativoDAO = new AplicativoDAO();
        $aplicativoDAO->create($aplicativo);
        
        return $response;
    })->add($validJson)->add($authBasic);
    
    $app->put('/aplicativo/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $aplicativoDAO = new AplicativoDAO();
        $aplicativo = $aplicativoDAO->getAplicativo($id);

        $aplicativo->setNome($body['nome']);
        $aplicativo->setMAC($body['mac']);

        $aplicativoDAO->update($aplicativo);

        return $response;
    })->add($validJson)->add($authBasic);
    
    $app->delete('/aplicativo/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE aplicativo";
    })->add($authBasic);
