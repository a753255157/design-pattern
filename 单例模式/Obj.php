<?php
class Obj
{
    private static $instance;
    
    private $id;
    
    private function __construct(){
        $this->id = mt_rand(100, 999);
    }
    
    public static function getInstance()
    {
        if (empty(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function __clone(){
        die('Clone is not allowed.' . E_USER_ERROR);
    }
}