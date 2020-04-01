<?php
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    require_once ($class_name . '.php');
});

$obj1 = Obj::getInstance();

echo $obj1->getId()."\n";

$obj2 = Obj::getInstance();

echo $obj2->getId()."\n";
