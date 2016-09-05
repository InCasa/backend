<?php
    function loadClass($classname) {
            if(is_readable('Class/'.$classname.'.php')) {
                require 'Class/'.$classname.'.php';
            }
        }
        
        function loadModels($classname) {
            if(is_readable('Models/'.$classname.'.php')) {
                require 'Models/'.$classname.'.php';
            }
        }
        
        spl_autoload_register('loadClass');
        spl_autoload_register('loadModels');
?>