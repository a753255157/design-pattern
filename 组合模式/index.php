<?php
spl_autoload_register(function($class_name){
    $class_name = str_replace('\\','/', $class_name);
    require_once($class_name.'.php');
});

$boss = new Employee('老板');

$techManager = new Employee('技术部经理');
$saleManager = new Employee('市场部经理');

$techLeader = new Employee('技术部领导');
$saleLeaderA = new Employee('市场部领导A');
$saleLeaderB = new Employee('市场部领导B');

$techWorkerA = new Employee('技术部员工A');
$techWorkerB = new Employee('技术部员工B');
$techWorkerC = new Employee('技术部员工C');
$techWorkerD = new Employee('技术部员工D');
$techWorkerE = new Employee('技术部员工E');
$techGuestN = new Employee('技术部外包N');
$techGuestM = new Employee('技术部外包M');

$saleWorkerA = new Employee('市场部员工A');
$saleWorkerE = new Employee('市场部员工E');
$saleWorkerF = new Employee('市场部员工F');

$boss->add($techManager);
$boss->add($saleManager);

$techManager->add($techLeader);
$techLeader->add($techWorkerA);
$techLeader->add($techWorkerB);
$techLeader->add($techWorkerC);
$techLeader->add($techWorkerD);

$saleManager->add($saleLeaderA);
$saleManager->add($saleLeaderB);
$saleLeaderA->add($saleWorkerE);
$saleLeaderA->add($saleWorkerF);
$saleLeaderB->add($saleWorkerA);

$techWorkerC->add($techGuestN);
$techWorkerC->add($techGuestM);

$techLeader->remove($techWorkerD);
$techLeader->add($techWorkerE);

$boss->display();
