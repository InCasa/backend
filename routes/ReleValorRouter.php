<?php
	global $app;

    $app->get('/releValor/{id}',  function () {	
		return "Rota GET releValor";
	});
    
    $app->post('/releValor', function() {
        return "Rota POST releValor";
    })->add($validJson);
    
    $app->put('/releValor/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT releValor";
    })->add($validJson);
    
    $app->delete('/releValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE releValor";
    });
