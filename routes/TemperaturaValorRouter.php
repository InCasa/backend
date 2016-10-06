<?php
	global $app;

    $app->get('/temperaturaValor',  function () {	
		return "temperaturaValor: " . rand(0, 100);
	});
    
    $app->post('/temperaturaValor', function() {
        return "Rota POST temperaturaValor";
    })->add($validJson);
    
    $app->put('/temperaturaValor/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT temperaturaValor";
    })->add($validJson);
    
    $app->delete('/temperaturaValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE temperaturaValor";
    });
