<?php	

	$validJson = function ($request, $response, $next) {					
		if(preg_match('#application/json#', strtolower($request->getHeaderLine('Content-Type')))) {	
			$next($request, $response);				
			return $response;
		} else {			
			return $response->withJson(array('Message' => 'Invalid contentType'),400);			
		}		
	};
    
    $authBasic = function ($request, $response){
        $headers = $request->getHeaders();
        
        $stringHeader = $headers['Authorization'];
        $stringHeader = $stringHeader.split(' ')[1].split(':');
        echo($stringHeader);
        
        $login = $stringHeader[0];
        echo($login);
        $senha = $stringHeader[1];
        echo($senha);
        
        $userDAO = new UserDAO();
        
        if($userDAO->getUserLogin($login, $senha)){
            $newResponse = $response->withStatus(200);
            return $newResponse;
        }else{
            $newResponse = $response->withStatus(203);
            return $newResponse;
        }
    }
	
	foreach(glob("routes/*.php") as $filename){
        include $filename;
    }