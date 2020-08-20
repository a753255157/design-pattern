<?php
spl_autoload_register(function($class_name){
    $class_name = str_replace('\\', '/', $class_name);
    require_once ($class_name . '.php');
});

use threads_v1\Example;

(new Example())->run();
