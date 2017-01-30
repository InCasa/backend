<?php
    global $app;

    $app->post('/comando', function($request, $response, $args) {
        $body = $request->getParsedBody();
      
        $comando = $body['comando'];
        $json = CommandRead::readCommand($comando);
        
        //$json = array('valido' => true);

        $newResponse = $response->withJson($json);		
		
		return $newResponse; 

    })->add($validJson)->add($authBasic);
