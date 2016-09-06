<?PHP 
    require 'vendor/autoload.php';
    
    $app = new \Slim\App();

    

    $app->get('/',  function ($request, $response, $args) {	
		
        echo 'Teste';

	});

    
  
    require 'autoload.php';
    require 'Routes.php';

    $app-> run(); 

?>