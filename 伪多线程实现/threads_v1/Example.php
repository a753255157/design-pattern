<?php
namespace threads_v1;

class Example
{
    public function task1()
    {
        for ($i = 1; $i < 10; $i++){
            echo 'This is task 1: '.$i.PHP_EOL;
            yield ;
        }
    }
    
    public function task2()
    {
        for ($i = 1; $i < 5; $i++){
            echo 'This is task 2: '.$i.PHP_EOL;
            yield ;
        }
    }
    
    public function run()
    {
        $scheuler = new Scheduler();
        $scheuler->addTask($this->task2());
        $scheuler->addTask($this->task1());
        $scheuler->run();
    }
}