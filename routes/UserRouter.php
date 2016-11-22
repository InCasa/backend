<?php
	global $app;
    
    $app->get('/user',  function () {
        $userDAO = new UserDAO();
        $users = array();
        $users = $userDAO->getAll();
        
        $json = array();
        foreach ($users as $user) {
            $json[] = array('id'=>$user->getIdUser(), 
            'nome'=>$user->getNome(), 
            'login'=>$user->getLogin());
        }
        
        return json_encode($json);
	});

    $app->get('/user/{id}',  function ($request, $response) {
        $id = $request->getAttribute('id');
        
        $userDAO = new UserDAO();
        $user = $userDAO->getUser($id);
        
        $json = array('id'=>$user->getIdUser(), 
        'nome'=>$user->getNome(), 
        'login'=>$user->getLogin());
        
		return json_encode($json);
	});

    $app->post('/user',  function ($request, $response, $args) {	
		$user = new User();

        $body = $request->getParsedBody();
      
        $user->setNome($body['nome']);
        $user->setLogin($body['login']);
        $user->setSenha($body['senha']);

        $userDAO = new UserDAO();
        $userDAO->create($user);

        $response->getBody()->write("Hello,".$user->getNome());
        return $response;
        
	})->add($validJson);
    
    $app->post('/userLogin',  function ($request, $response, $args) {	
		$body = $request->getParsedBody();
              
        $login = $body['login'];
        $senha = $body['senha'];

        $userDAO = new UserDAO();
        if($userDAO->getUserLogin($login, $senha)) {
            $response->getBody()->write("Logado");
            return $response;
        } else {
            $response->getBody()->write("Errou");
            return $response;
        }
        
	})->add($validJson, $authBasic);
        
    $app->put('/user/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');
        
        $body = $request->getParsedBody();
        
        $userDAO = new UserDAO();
        $user = $userDAO->getUser($id);
        
        $user->setNome($body['nome']);
        $user->setLogin($body['login']);
        $user->setSenha($body['senha']);
        
        $userDAO->update($user);
        
        return $response;
    })->add($validJson);
    
    $app->delete('/user/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE user";
    });
