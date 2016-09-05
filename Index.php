<?php

    header("Access-Control-Allow-Origin: *");
 	
	// Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
	
	// Define o horario para UTC+0 (mesmo horario independente do servidor)
	ini_set('date.timezone', 'America/Sao_Paulo');
				
	// Importa Slim
	require 'vendor/slim/slim/Slim/App.php';
	vendor\slim\slim\Slim::registerAutoloader();
	
	// Autoloader de classes customizadas
	require 'Autoloader.php';

	// Cria aplicação
	$app = new vendor\slim\slim\Slim();
	
	// Importa rotas
	require 'Routes.php';
	
	// Inicia aplicação
	$app->run();
