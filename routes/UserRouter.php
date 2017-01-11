<?php
	global $app;
    
    $app->get('/users',  function () {
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
	})->add($authBasic);

    $app->get('/user/{id}',  function ($request, $response) {
        $id = $request->getAttribute('id');
        
        $userDAO = new UserDAO();
        $user = $userDAO->getUser($id);
        
        $json = array('id'=>$user->getIdUser(), 
        'nome'=>$user->getNome(), 
        'login'=>$user->getLogin());
        
		return json_encode($json);
	})->add($authBasic);

    $app->post('/getUser',  function ($request, $response) {
        $body = $request->getParsedBody();
        $login = $body['login'];
        $senha = $body['senha'];

        $userDAO = new UserDAO();
        $user = $userDAO->getUserLogin($login, $senha);
        
        $json = array('id'=>$user->getIdUser(), 
        'nome'=>$user->getNome(), 
        'login'=>$user->getLogin());
        
		$newResponse = $response->withJson($json);		
		
		return $newResponse; 
	})->add($validJson)->add($authBasic);

    $app->post('/user',  function ($request, $response) {	
		$user = new User();

        $body = $request->getParsedBody();
      
        $user->setNome($body['nome']);
        $user->setLogin($body['login']);
        $user->setSenha($body['senha']);

		$userDAO = new UserDAO();
		
		$duplicate = $userDAO->getDuplicateLogin($body['login']);		
		
		if($duplicate) {
			$data = array('valido' => false);
			$newResponse = $response->withJson($data);		
		
			return $newResponse;	
		} else {
			$userDAO->create($user);
			$data = array('valido' => true);
			$newResponse = $response->withJson($data);		
		
			return $newResponse;	
		}
        
	})->add($validJson)->add($authBasic);
    
    $app->post('/userLogin',  function ($request, $response, $args) {
        $data = array('Authorized' => true);
        $newResponse = $response->withJson($data);
        	
        return $newResponse;	
	})->add($authBasic);
        
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
    })->add($validJson)->add($authBasic);
    
    $app->delete('/user/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE user";
    })->add($authBasic);
	
	$app->post('/userID',  function ($request, $response) {
		$body = $request->getParsedBody();
		
		$login = $body['login'];
		$senha = $body['senha'];
		
        $userDAO = new UserDAO();
        
        $userid = $userDAO->getUserID($login, $senha);
	
		$json[] = array('id'=>$userid);
		
        $newResponse = $response->withJson($json);
        return $newResponse;
	})->add($validJson)->add($authBasic);
