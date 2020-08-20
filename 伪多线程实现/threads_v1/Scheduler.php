<?php
namespace threads_v1;

class Scheduler
{
    protected $currentTaskId = 0;
    
    /**
     * taskId => Task
     * @var array
     */
    protected $taskMap = [];
    
    /**
     * @var \SplQueue
     */
    protected $taskQueue;
    
    public function __construct()
    {
        $this->taskQueue = new \SplQueue();
    }
    
    public function addTask(\Generator $coroutine)
    {
        $taskId = ++$this->currentTaskId;
        $task = new Task($taskId, $coroutine);
        $this->taskMap[$taskId] = $task;
        $this->schedule($task);
        return $taskId;
    }
        
    public function schedule(Task $task)
    {
        $this->taskQueue->enqueue($task);
    }
    
    public function run()
    {
        while (!$this->taskQueue->isEmpty()){
            /** @var \threads_v1\Task $task */
            $task = $this->taskQueue->dequeue();
            $task->run();
            if ($task->isValid()){
                $this->schedule($task);
            }else{
                unset($this->taskMap[$task->getTaskId()]);
            }
        }
    }
}