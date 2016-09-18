<?php
	global $app;

    $app->get('/rele/{id}',  function () {	
		return "Rota GET Rele";
	});
    
    $app->post('/rele', function() {
        return "Rota POST Rele";
    })->add($validJson);
    
    $app->put('/rele/update/{id}',function($request, $reponse, $args) {
        print_r($args);
        return "Rota PUT Rele";
    })->add($validJson);
    
    $app->delete('/rele/delete/{id}', function($request, $reponse, $args) {
        return "Rota DELETE Rele";
    });
