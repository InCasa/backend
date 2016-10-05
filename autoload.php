<?php
	function loadClass($classname) {
		if(is_readable('class/'.$classname.'.php')) {
			require 'class/'.$classname.'.php';
		}
	}
	
	function loadModels($classname) {
		if(is_readable('model/'.$classname.'.php')) {
			require 'model/'.$classname.'.php';
		}
	}
    
	function loadDAO($classname) {
		if(is_readable('dao/'.$classname.'.php')) {
			require 'dao/'.$classname.'.php';
		}
	}
    	
	spl_autoload_register('loadClass');
	spl_autoload_register('loadModels');
    spl_autoload_register('loadDAO');