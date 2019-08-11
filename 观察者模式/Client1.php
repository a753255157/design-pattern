<?php
use interfaces\ObserveClient;

class Client1 implements ObserveClient {
    public function update()
    {
        echo "This is Client1.\n";
    }
}