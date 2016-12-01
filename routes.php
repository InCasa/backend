<?php	

	$validJson = function ($request, $response, $next) {					
		if(preg_match('#application/json#', strtolower($request->getHeaderLine('Content-Type')))) {	
			$next($request, $response);				
			return $response;
		} else {			
			return $response->withJson(array('Message' => 'Invalid contentType'), 400);			
		}		
	};
    
    $authBasic = function ($request, $response, $next){
        $headers = $request->getHeaders();
        $login;
        $senha;
        $auth;

        if($headers['PHP_AUTH_USER'] != 0){
            $login = $headers['PHP_AUTH_USER'][0];
            $senha = $headers['PHP_AUTH_PW'][0];
        }else{
            $auth = $headers['Authorization'];

            $auth = substr($auth, -6);
            $auth = base64_decode($auth);
            list ($loginAuth, $senhaAuth) = split (':', $auth);
            $login = loginAuth;
            $senha = $senhaAuth;
        }

        $userDAO = new UserDAO();
        
        if($userDAO->getUserLogin($login, $senha)){
            $next($request, $response);				
			return $response;
        }else{
            return $response->withJson(array('Authorized' => false), 401);	
        }
    };
	
	foreach(glob("routes/*.php") as $filename){
        include $filename;
    }