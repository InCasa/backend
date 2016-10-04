<?php
	global $app;

    $app->get('/user',  function () {	
		return "Rota GET user";
	});

    $app->post('/user',  function ($request, $reponse, $args) {	
		$user = new User();

        $body = $request->getParsedBody();
      
        $user->setNome($body['nome']);
        $user->setLogin($body['login']);
        $user->setSenha($body['senha']);

        $userDAO = new UserDAO();
        $userDAO->create($user);

        $response->getBody()->write("Hello,".$user->getNome());
        return $reponse;
        
	})->add($validJson);
        
    $app->put('/user/update/{id}',function($request, $reponse, $args) {
        print_r($args);
        return "Rota PUT user";
    })->add($validJson);
    
    $app->delete('/user/delete/{id}', function($request, $reponse, $args) {
        return "Rota DELETE user";
    });
