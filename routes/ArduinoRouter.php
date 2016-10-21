<?php
	global $app;

    $app->get('/arduino',  function () {	
		return "Rota GET arduino";
	});
    
    $app->get('/arduino/{id}',  function ($request, $response) {
        $id = $request->getAttribute('id');
        
        $arduinoDAO = new ArduinoDAO();
        $arduino = $arduinoDAO->getArduino($id);
        
        $json = array('id'=>$arduino->getIdArduino(), 
            'ip'=>$arduino->getIP(), 
            'mac'=>$arduino->getMAC(), 
            'gateway'=>$arduino->getGateway(),
            'mask'=>$arduino->getMask(), 
            'PinoDHT'=>$arduino->getPinoDHT(), 
            'PinoRele1'=>$arduino->getPinoRele1(), 
            'PinoRele2'=>$arduino->getPinoRele2(), 
            'PinoRele3'=>$arduino->getPinoRele3(), 
            'PinoRele4'=>$arduino->getPinoRele4(),
            'PinoLDR'=>$arduino->getPinoLDR(), 
            'porta'=>$arduino->getPorta(), 
            'cod'=>$arduino->getCod()
            );
        
		return json_encode($json);
	});
    
    $app->post('/arduino', function($request, $response) {
		$arduino = new Arduino();

        $body = $request->getParsedBody();
      
        $arduino->setIp($body['ip']);
        $arduino->setMAC($body['mac']);
        $arduino->setGateway($body['gateway']);
        $arduino->setMask($body['mask']);
        $arduino->setPorta($body['porta']);
        $arduino->setCod($body['cod']);
        $arduino->setPinoDHT22($body['PinoDHT']);
        $arduino->setPinoRele1($body['PinoRele1']);
        $arduino->setPinoRele2($body['PinoRele2']);
        $arduino->setPinoRele3($body['PinoRele3']);
        $arduino->setPinoRele4($body['PinoRele4']);
        $arduino->setPinoLDR($body['PinoLDR']);

        $arduinoDAO = new ArduinoDAO();
        $arduinoDAO->create($arduino);

        $response->getBody()->write("Hello,".$arduino->getMAC());
        return $response;
    })->add($validJson);
    
    $app->put('/arduino/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');

        $body = $request->getParsedBody();

        $arduinoDAO = new ArduinoDAO();
        $arduino = $arduinoDAO->getArduino($id);

        $arduino->setIp($body['ip']);
        $arduino->setMAC($body['mac']);
        $arduino->setGateway($body['gateway']);
        $arduino->setMask($body['mask']);
        $arduino->setPorta($body['porta']);
        $arduino->setCod($body['cod']);
        $arduino->setPinoDHT22($body['PinoDHT']);
        $arduino->setPinoRele1($body['PinoRele1']);
        $arduino->setPinoRele2($body['PinoRele2']);
        $arduino->setPinoRele3($body['PinoRele3']);
        $arduino->setPinoRele4($body['PinoRele4']);
        $arduino->setPinoLDR($body['PinoLDR']);

        $arduinoDAO->update($arduino);

        return $response;        
    })->add($validJson);
    
    $app->delete('/arduino/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE arduino";
    });
