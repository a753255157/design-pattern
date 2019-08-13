<?php
/**
 * 观察者B
 */
class ClientB implements SplObserver
{

    public function update(SplSubject $subject)
    {
        echo "ClientB received from $subject->name.\n";
    }
}