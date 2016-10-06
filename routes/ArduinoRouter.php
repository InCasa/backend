<?php
	global $app;

    $app->get('/arduino',  function () {	
		return "Rota GET arduino";
	});
    
        $app->get('/arduino/{id}',  function ($request, $response) {
        $id = $request->getAttribute('id');
        
        $arduinoDAO = new ArduinoDAO();
        $arduino = $arduinoDAO->getArduino($id);
        
        $json = array('id'=>$arduino->getIdArduino(), 'ip'=>$arduino->getIP(), 'mac'=>$arduino->getMAC(), 'gateway'=>$arduino->getGateway,
        'mask'=>$arduino->getMask(), 'PinoDHT'=>$arduino->getPinoDHT(), 'PinoRele1'=>$arduino->getPinoRele1(), 'PinoRele2'=>$arduino->getPinoRele2(), 'PinoRele3'=>$arduino->getPinoRele3(), 'PinoRele4'=>$arduino->getPinoRele4(),
        'PinoLDR'=>$arduino->getPinoLDR(), 'porta'=>$arduino->getPorta(), 'cod'=>$arduino->getCod());
        
		return json_encode($json);
	});
    
    $app->post('/arduino', function() {
        return "Rota POST arduino";
    })->add($validJson);
    
    $app->put('/arduino/update/{id}',function($request, $response, $args) {
        print_r($args);
        return "Rota PUT arduino";
    })->add($validJson);
    
    $app->delete('/arduino/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE arduino";
    });
