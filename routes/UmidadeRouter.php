<?php
	global $app;

    $app->get('/umidade',  function () {	
		return "Umidade: " . rand(0, 100);
	});
    
    $app->post('/umidade', function() {
        return "Rota POST umidade";
    })->add($validJson);
    
    $app->put('/umidade/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT umidade";
    })->add($validJson);
    
    $app->delete('/umidade/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE umidade";
    });
