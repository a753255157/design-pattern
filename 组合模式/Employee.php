<?php

class Employee
{

    public $name;

    private $employeeList = [];

    private $symbol = '';
    
    private const SYMBOL = [
        1 => '├┈',
        2 => '└┈',
        3 => '┊  ',
        4 => '    ',
    ];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function add(Employee $employee)
    {
        if (!empty($this->employeeList)){
            end($this->employeeList)->symbol = self::SYMBOL[1];
        }
        
        $employee->symbol = self::SYMBOL[2];
        
        $this->employeeList[$employee->name] = $employee;
    }

    public function remove(Employee $employee)
    {
        unset($this->employeeList[$employee->name]);
        if (!empty($this->employeeList)){
            end($this->employeeList)->symbol = self::SYMBOL[2];
        }
    }

    public function display(int $index = 0, $str = '')
    {
        echo $str . $this->symbol . $this->name . "\n";
        
        if ($this->symbol == self::SYMBOL[1]) {
            $str = $str . self::SYMBOL[3];
        } elseif ($this->symbol == self::SYMBOL[2]) {
            $str = $str . self::SYMBOL[4];
        }
        
        foreach ($this->employeeList as $employee) {
            $employee->display($index + 1, $str);
        }
        return;
    }
}