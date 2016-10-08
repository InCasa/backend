<?php
	global $app;

    $app->get('/luminosidade',  function () {			
        return "Luminosidade: " . rand(0, 100);
	});
    
    $app->get('/luminosidade/{id}',  function ($request, $response) {			
        $id = $request->getAttribute('id');
        
        $luminosidadeDAO = new LuminosidadeDAO();
        $luminosidade = $luminosidadeDAO->getLuminosidade($id);
        
        $json = array('id'=>$luminosidade->getIdLuminosidade(),
        'nome'=>$luminosidade->getNome(),
        'descricao'=>$luminosidade->getDescricao());
        
        return json_encode($json);
	});
    
    $app->post('/luminosidade', function($request, $response, $args) {
        $luminosidade = new Luminosidade();

        $body = $request->getParsedBody();
      
        $luminosidade->setNome($body['nome']);
        $luminosidade->setDescricao($body['descricao']);

        $luminosidadeDAO = new LuminosidadeDAO();
        $luminosidadeDAO->create($luminosidade);

        $response->getBody()->write("Hello,".$luminosidade->getNome());
        return $response;
    })->add($validJson);
    
    $app->put('/luminosidade/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT Luminosidade";
    })->add($validJson);
    
    $app->delete('/luminosidade/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE Luminosidade";
    });
