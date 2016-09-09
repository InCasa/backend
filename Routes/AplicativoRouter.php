<?php
    global $app;
    
    $app->get('/',  function () {	
        return "Rota Raiz";
	});

    $app->get('/aplicativo',  function () {	
		return "Rota Aplicativo";
	});
