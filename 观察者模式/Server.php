<?php
use interfaces\ObserveServer;

class Server implements ObserveServer {
    private $regists = [];

    public function attach($name, $obj)
    {
        $this->regists[$name] = $obj;
    }

    public function detach($name, $obj)
    {
        unset($this->regists[$name]);
    }

    public function notify()
    {
        foreach($this->regists as $obj){
            $obj->update();
        }
    }
}