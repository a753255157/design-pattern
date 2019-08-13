<?php
spl_autoload_register(function($class_name){
    $class_name = str_replace('\\','/', $class_name);
    require_once($class_name.'.php');
});

$server = new Server();

$clientA = new ClientA();
$clientB = new ClientB();

$server->attach($clientA);
$server->attach($clientB);

$server->notify();