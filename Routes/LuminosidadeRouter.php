<?php
	global $app;

    $app->get('/luminosidade',  function () {	
		return "Rota GET Luminosidade";
	});
    
    $app->post('/luminosidade', function() {
        return "Rota POST Luminosidade";
    })->add($validJson);
    
    $app->put('/luminosidade/update/{id}',function($request, $reponse, $args) {
        print_r($args);
        return "Rota PUT Luminosidade";
    })->add($validJson);
    
    $app->delete('/luminosidade/delete/{id}', function($request, $reponse, $args) {
        return "Rota DELETE Luminosidade";
    });
