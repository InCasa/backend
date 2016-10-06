<?php
    global $app;

    $app->get('/luminosidadeValor',  function () {			
        return "luminosidadeValor: " . rand(0, 100);
	});
    
    $app->post('/luminosidadeValor', function() {
        return "Rota POST luminosidadeValor";
    })->add($validJson);
    
    $app->put('/luminosidadeValor/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT luminosidadeValor";
    })->add($validJson);
    
    $app->delete('/luminosidadeValor/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE luminosidadeValor";
    });
