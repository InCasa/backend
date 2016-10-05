<?php
	global $app;

    $app->get('/luminosidade',  function () {			
        return "Luminosidade: " . rand(0, 100);
	});
    
    $app->post('/luminosidade', function() {
        return "Rota POST Luminosidade";
    })->add($validJson);
    
    $app->put('/luminosidade/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT Luminosidade";
    })->add($validJson);
    
    $app->delete('/luminosidade/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE Luminosidade";
    });
