<?php
spl_autoload_register(function($class_name){
    $class_name = str_replace('\\','/', $class_name);
    require_once($class_name.'.php');
});

$server = new Server();

$client1 = new Client1();
$client2 = new Client2();

$server->attach('c1', $client1);
$server->attach('c2', $client2);

$server->notify();
