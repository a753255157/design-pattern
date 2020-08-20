<?php
namespace threads_v1;

class Task
{
    protected $taskId;
    
    /** 
     * 执行的任务
     * @var \Generator
     */
    protected $coroutine;
    
    protected $sendValue = null;
    
    /** 第一次已被执行 */
    protected $isFirestYield = true;
    
    public function __construct($taskId, \Generator $coroutine)
    {
        $this->taskId = $taskId;
        $this->coroutine = $coroutine;
    }
    
    public function getTaskId()
    {
        return $this->taskId;
    }
    
    public function setSendValue($sendValue = null)
    {
        $this->sendValue = null;
    }
    
    public function run()
    {
        if ($this->isFirestYield){
            $this->isFirestYield = false;
            return $this->coroutine->current();
        }else{
            $result = $this->coroutine->send($this->sendValue);
            $this->sendValue = null;
            return $result;
        }
    }
    
    public function isValid()
    {
        return $this->coroutine->valid();
    }
}