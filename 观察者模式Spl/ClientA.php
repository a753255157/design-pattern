<?php
/**
 * 观察者A
 */
class ClientA implements SplObserver
{

    public function update(SplSubject $subject)
    {
        echo "ClientA recived from $subject->name.\n";
    }
}