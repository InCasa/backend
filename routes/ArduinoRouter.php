<?php
    global $app;

    $app->get('/arduino',  function () {	
		$arduinoDAO = new ArduinoDAO();
        $arduinos = array();
        $arduinos = $arduinoDAO->getAll();
        
        $json = array();
        foreach ($arduinos as $arduino) {
            $json[] = array('id'=>$arduino->getIdArduino(), 
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
            'PinoPresenca'=>$arduino->getPinoPresenca(), 
            'porta'=>$arduino->getPorta()
            );
        }
        
        return json_encode($json);
	})->add($authBasic);
    
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
            'PinoPresenca'=>$arduino->getPinoPresenca(), 
            'porta'=>$arduino->getPorta()
            );
        
        $newResponse = $response->withJson($json);
        //no android as vezes com o return comentado ele exibe as informações e as vezes não, ate o momento não se sabe o motivo para a aleatoriedade.
        return $newResponse;
	})->add($authBasic);
    
    $app->post('/arduino', function($request, $response) {
		$arduino = new Arduino();

        $body = $request->getParsedBody();
      
        $arduino->setIp($body['ip']);
        $arduino->setMAC($body['mac']);
        $arduino->setGateway($body['gateway']);
        $arduino->setMask($body['mask']);
        $arduino->setPorta($body['porta']);
        $arduino->setPinoDHT22($body['PinoDHT']);
        $arduino->setPinoRele1($body['PinoRele1']);
        $arduino->setPinoRele2($body['PinoRele2']);
        $arduino->setPinoRele3($body['PinoRele3']);
        $arduino->setPinoRele4($body['PinoRele4']);
        $arduino->setPinoLDR($body['PinoLDR']);
        $arduino->setPinoPresenca($body['PinoPresenca']);

        $arduinoDAO = new ArduinoDAO();
        $arduinoDAO->create($arduino);

        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
        
        return $newResponse;
    })->add($validJson)->add($authBasic);
    
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
        $arduino->setPinoDHT22($body['PinoDHT']);
        $arduino->setPinoRele1($body['PinoRele1']);
        $arduino->setPinoRele2($body['PinoRele2']);
        $arduino->setPinoRele3($body['PinoRele3']);
        $arduino->setPinoRele4($body['PinoRele4']);
        $arduino->setPinoLDR($body['PinoLDR']);
        $arduino->setPinoPresenca($body['PinoPresenca']);

        $arduinoDAO->update($arduino);

        return $response;        
    })->add($validJson)->add($authBasic);
    
    $app->delete('/arduino/delete/{id}', function($request, $response, $args) {
        return "Rota DELETE arduino";
    })->add($authBasic);
