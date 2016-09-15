<?php
	global $app;

    $app->get('/aplicativo',  function () {	
		return "Rota GET aplicativo";
	});
    
    $app->post('/aplicativo', function() {
        return "Rota POST aplicativo";
    })->add($validJson);
    
    $app->put('/aplicativo/update/{id}',function($request, $reponse, $args) {
        print_r($args);
        return "Rota PUT aplicativo";
    })->add($validJson);
    
    $app->delete('/aplicativo/delete/{id}', function($request, $reponse, $args) {
        return "Rota DELETE aplicativo";
    });
