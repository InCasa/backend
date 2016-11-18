<?php
	global $app;

    $app->get('/umidade',  function () {	
		$umidadeDAO = new UmidadeDAO();
        $umidades = array();
        $umidades = $umidadeDAO->getAll();
        
        $json = array();
        foreach ($umidades as $umidade) {
            $json[] = array('id'=>$umidade->getIdUmidade(),
            'nome'=>$umidade->getNome(),
            'descricao'=>$umidade->getDescricao());
        }
        
        return json_encode($json);
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
    
    $app->put('/umidade/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $umidadeDAO = new UmidadeDAO();
        $umidade = $umidadeDAO->getUmidade($id);

        $umidade->setNome($body['nome']);
        $umidade->setDescricao($body['descricao']);

        $umidadeDAO->update($umidade);

        return $response;
    })->add($validJson);
    
    $app->delete('/umidade/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE umidade";
    });
