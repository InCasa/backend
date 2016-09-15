<?php
	global $app;

    $app->get('/arduino',  function () {	
		return "Rota GET arduino";
	});
    
    $app->post('/arduino', function() {
        return "Rota POST arduino";
    })->add($validJson);
    
    $app->put('/arduino/update/{id}',function($request, $reponse, $args) {
        print_r($args);
        return "Rota PUT arduino";
    })->add($validJson);
    
    $app->delete('/arduino/delete/{id}', function($request, $reponse, $args) {
        return "Rota DELETE arduino";
    });
