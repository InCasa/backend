<?php 
    require 'vendor/autoload.php';
    require 'autoload.php';
    
    $app = new \Slim\App();        
        
	include 'routes.php';
	
    $app->run();