<?php	

	$validJson = function ($request, $response, $next) {					
		if(preg_match('#application/json#', strtolower($request->getHeaderLine('Content-Type')))) {	
			$next($request, $response);				
			return $response;
		} else {			
			return $response->withJson(array('Message' => 'Invalid contentType'),400);			
		}		
	};
	
	foreach(glob("routes/*.php") as $filename){
        include $filename;
    }