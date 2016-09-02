<?php
    $app->post('/aplicativo', 'validJson',  function() use ($body) {	
		//$Aplicativo = new Aplicativo($body);
		//$Aplicativo->create();

        $response->write("Rota Aplicativo");
        return $response;

	});

?>