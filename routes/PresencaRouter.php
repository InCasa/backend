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
        
        return json_encode($json);
	})->add($authBasic);
    
    $app->get('/presenca/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $presencaDAO = new PresencaDAO();
        $presenca = $presencaDAO->getPresenca($id);
        
        $json = array('id'=>$presenca->getIdPresenca(),
        'nome'=>$presenca->getNome(),
        'descricao'=>$presenca->getDescricao());
        
        return json_encode($json);
	})->add($authBasic);
    
    $app->post('/presenca', function($request, $response, $args) {
        $presenca = new Presenca();

        $body = $request->getParsedBody();
      
        $presenca->setNome($body['nome']);
        $presenca->setDescricao($body['descricao']);

        $presencaDAO = new PresencaDAO();
        $presencaDAO->create($presenca);

        $response->getBody()->write("Hello,".$presenca->getNome());
        return $response;
    })->add($validJson)->add($authBasic);
    
    $app->put('/presenca/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $presencaDAO = new PresencaDAO();
        $presenca = $presencaDAO->getPresenca($id);

        $presenca->setNome($body['nome']);
        $presenca->setDescricao($body['descricao']);

        $presencaDAO->update($presenca);

        return $response;
    })->add($validJson)->add($authBasic);
    
    $app->delete('/presenca/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE Presenca";
    })->add($authBasic);
