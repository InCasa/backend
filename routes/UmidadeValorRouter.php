<?php
	global $app;

    $app->get('/umidadeValor',  function () {	
		return "umidadeValor: " . rand(0, 100);
	});
    
    $app->post('/umidadeValor', function() {
        return "Rota POST umidadeValor";
    })->add($validJson);
    
    $app->put('/umidadeValor/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT umidadeValor";
    })->add($validJson);
    
    $app->delete('/umidadeValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE umidadeValor";
    });
