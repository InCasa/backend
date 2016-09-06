<?php
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	require '../vendor/autoload.php';
	require '../autoload.php';

	$app = new \Slim\App;

	$app->get('/test', function (Request $request, Response $response) {		
		$response->getBody()->write("Funcionando...");

		return $response;
	});
	$app->run();