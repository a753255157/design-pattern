<?php
use interfaces\ObserveClient;

class Client2 implements ObserveClient {
    public function update()
    {
        echo "This is Client2.\n";
    }
}