<?php
    global $app;

    $app->get('/teste',  function ($request, $response) {
        return $response->withJson(array('Message' => 'Server OK'), 200);
	});
