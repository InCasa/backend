<?php
	global $app;

    $app->get('/user',  function () {	
		return "Rota GET user";
	});
    
    $app->post('/user', function() {
        return "Rota POST user";
    })->add($validJson);
    
    $app->put('/user/update/{id}',function($request, $reponse, $args) {
        print_r($args);
        return "Rota PUT user";
    })->add($validJson);
    
    $app->delete('/user/delete/{id}', function($request, $reponse, $args) {
        return "Rota DELETE user";
    });
