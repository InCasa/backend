<?php
	global $app;

    $app->get('/temperatura',  function () {	
		return "Temperatura: " . rand(0, 100);
	});
    
    $app->post('/temperatura', function() {
        return "Rota POST temperatura";
    })->add($validJson);
    
    $app->put('/temperatura/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT temperatura";
    })->add($validJson);
    
    $app->delete('/temperatura/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE temperatura";
    });
