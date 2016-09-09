<?php 
    require 'vendor/autoload.php';
    require 'autoload.php';
    
    $app = new \Slim\App();
    
    foreach(glob("routes/*.php") as $filename){
        include $filename;
    }
    
    $app->run();