<?php
	global $app;

    $app->get('/presenca',  function () {			
        $presencaDAO = new PresencaDAO();
        $presencas = array();
        $presencas = $presencaDAO->getAll();
        
        $json = array();
        foreach ($presencas as $presenca) {
            $json[] = array('id'=>$presenca->getIdPresenca(),
            'nome'=>$presenca->getNome(),
            'descricao'=>$presenca->getDescricao());
        }
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->get('/presenca/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $presencaDAO = new PresencaDAO();
        $presenca = $presencaDAO->getPresenca($id);
        
        $json = array('id'=>$presenca->getIdPresenca(),
        'nome'=>$presenca->getNome(),
        'descricao'=>$presenca->getDescricao());
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->post('/presenca', function($request, $response, $args) {
        $presenca = new Presenca();

        $body = $request->getParsedBody();
      
        $presenca->setNome($body['nome']);
        $presenca->setDescricao($body['descricao']);

        $presencaDAO = new PresencaDAO();
        $presencaDAO->create($presenca);

        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
    })->add($validJson)->add($authBasic);
    
    $app->put('/presenca/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $presencaDAO = new PresencaDAO();
        $presenca = $presencaDAO->getPresenca($id);

        $presenca->setNome($body['nome']);
        $presenca->setDescricao($body['descricao']);

        $presencaDAO->update($presenca);

        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
    })->add($validJson)->add($authBasic);
    
    $app->delete('/presenca/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE Presenca";
    })->add($authBasic);
