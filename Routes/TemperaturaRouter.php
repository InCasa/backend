<?php
	global $app;

    $app->get('/temperatura',  function () {	
		return "Rota GET temperatura";
	});
    
    $app->post('/temperatura', function() {
        return "Rota POST temperatura";
    })->add($validJson);
    
    $app->put('/temperatura/update/{id}',function($request, $reponse, $args) {
        print_r($args);
        return "Rota PUT temperatura";
    })->add($validJson);
    
    $app->delete('/temperatura/delete/{id}', function($request, $reponse, $args) {
        return "Rota DELETE temperatura";
    });
