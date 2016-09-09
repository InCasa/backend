<?php
    global $app;

    $app->get('/aplicativo',  function () {	
		return "Rota Aplicativo";
	});
	
	$app->post('/aplicativo/ip/{nome}', function ($request, $reponse, $args) {
		print_r($args);
		return "Rota Aplicativo ip";
		
	})->add($validJson);
