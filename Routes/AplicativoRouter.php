<?php
    $app->get('/aplicativo',  function() use ($body) {	
		//$Aplicativo = new Aplicativo($body);
		//$Aplicativo->create();

        $response->write("Rota Aplicativo");
        return $response;

	});

?>