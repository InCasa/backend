<?php

    $app->get('/aplicativo',  function (Request $request, Response $response) {	
		//$Aplicativo = new Aplicativo($body);
		//$Aplicativo->create();

        $response->write("Rota Aplicativo");
        return $response;

	});
