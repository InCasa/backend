<?php
	global $app;

    $app->get('/luminosidade',  function () {			
        $luminosidadeDAO = new LuminosidadeDAO();
        $arduinos = array();
        $luminosidades = $luminosidadeDAO->getAll();
        
        $json = array();
        foreach ($luminosidades as $luminosidade) {
            $json[] = array('id'=>$luminosidade->getIdLuminosidade(),
            'nome'=>$luminosidade->getNome(),
            'descricao'=>$luminosidade->getDescricao());
        }
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->get('/luminosidade/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $luminosidadeDAO = new LuminosidadeDAO();
        $luminosidade = $luminosidadeDAO->getLuminosidade($id);
        
        $json = array('id'=>$luminosidade->getIdLuminosidade(),
        'nome'=>$luminosidade->getNome(),
        'descricao'=>$luminosidade->getDescricao());
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($authBasic);
    
    $app->post('/luminosidade', function($request, $response, $args) {
        $luminosidade = new Luminosidade();

        $body = $request->getParsedBody();
      
        $luminosidade->setNome($body['nome']);
        $luminosidade->setDescricao($body['descricao']);

        $luminosidadeDAO = new LuminosidadeDAO();
        $luminosidadeDAO->create($luminosidade);

        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
    })->add($validJson)->add($authBasic);
    
    $app->put('/luminosidade/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $luminosidadeDAO = new LuminosidadeDAO();
        $luminosidade = $luminosidadeDAO->getLuminosidade($id);

        $luminosidade->setNome($body['nome']);
        $luminosidade->setDescricao($body['descricao']);

        $luminosidadeDAO->update($luminosidade);

        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
    })->add($validJson)->add($authBasic);
    
    $app->delete('/luminosidade/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE Luminosidade";
    })->add($authBasic);
