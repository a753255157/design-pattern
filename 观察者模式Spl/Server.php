<?php

class Server implements SplSubject
{
    
    public $name = 'Server';

    private $observer_list = [];

    public function attach(SplObserver $observer)
    {
        $this->observer_list[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        $this->observer_list = array_filter($this->observer_list, function ($item) use ($observer) {
            return $item !== $observer;
        });
    }

    public function notify()
    {
        $this->observer_list = array_map(function ($item) {
            $item->update($this);
        }, $this->observer_list);
    }
}