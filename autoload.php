<?php
	function loadClass($classname) {
		if(is_readable('class/'.$classname.'.php')) {
			require 'class/'.$classname.'.php';
		}
	}
	
	function loadModels($classname) {
		if(is_readable('models/'.$classname.'.php')) {
			require 'models/'.$classname.'.php';
		}
	}
	
	function loadRoutes($classname) {
		if(is_readable('routes/'.$classname.'.php')) {
			require 'routes/'.$classname.'.php';
		}
	}
	
	spl_autoload_register('loadClass');
	spl_autoload_register('loadModels');
	spl_autoload_register('loadRoutes');
	