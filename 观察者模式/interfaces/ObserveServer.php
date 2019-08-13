<?php
namespace interfaces;

use interfaces\ObserveClient;

interface ObserveServer
{

    public function attach(string $name, ObserveClient $observer);

    public function detach(string $name, ObserveClient $observer);

    public function notify();
}