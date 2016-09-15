<?php
	global $app;

    $app->get('/umidade',  function () {	
		return "Rota GET umidade";
	});
    
    $app->post('/umidade', function() {
        return "Rota POST umidade";
    })->add($validJson);
    
    $app->put('/umidade/update/{id}',function($request, $reponse, $args) {
        print_r($args);
        return "Rota PUT umidade";
    })->add($validJson);
    
    $app->delete('/umidade/delete/{id}', function($request, $reponse, $args) {
        return "Rota DELETE umidade";
    });
