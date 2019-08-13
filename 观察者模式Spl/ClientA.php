<?php
/**
 * 观察者A
 */
class ClientA implements SplObserver
{

    public function update(SplSubject $subject)
    {
        echo "ClientA received from $subject->name.\n";
    }
}