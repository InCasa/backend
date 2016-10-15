<?php
	global $app;

    $app->get('/umidade',  function () {	
		return "Umidade: " . rand(0, 100);
	});
    
    $app->get('/umidade/{id}',  function ($request, $response) {	
		$id = $request->getAttribute('id');
        
        $umidadeDAO = new UmidadeDAO();
        $umidade = $umidadeDAO->getUmidade($id);
        
        $json = array('id'=>$umidade->getIdUmidade(),
        'nome'=>$umidade->getNome(),
        'descricao'=>$umidade->getDescricao());
        
        return json_encode($json);
	});
    
    $app->post('/umidade', function($request, $response) {
        $umidade = new Umidade();
        
        $body = $request->getParsedBody();
        
        $umidade->setNome($body['nome']);
        $umidade->setDescricao($body['descricao']);
        
        $umidadeDAO = new UmidadeDAO();
        $umidadeDAO->create($umidade);
        
        return $response;
    })->add($validJson);
    
    $app->put('/umidade/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT umidade";
    })->add($validJson);
    
    $app->delete('/umidade/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE umidade";
    });
