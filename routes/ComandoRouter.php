<?php
    global $app;

    $app->post('/comando', function($request, $response, $args) {
        $body = $request->getParsedBody();
      
        $comando = $body['comando'];
        CommandRead::readCommand($comando);
        
    })->add($validJson)->add($authBasic);
