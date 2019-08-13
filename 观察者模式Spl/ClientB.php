<?php
/**
 * 观察者B
 */
class ClientB implements SplObserver
{

    public function update(SplSubject $subject)
    {
        echo "ClientB recived from $subject->name.\n";
    }
}