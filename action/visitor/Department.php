<?php

namespace visitor;


include_once 'Entity.php';
include_once 'Visitor.php';
class Department implements Entity
{
    private $name;

    /**
     * @var Employee[]
     */
    private $employees;

    public function __construct($name, $employees)
    {
        $this->name = $name;
        $this->employees = $employees;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmployees()
    {
        return $this->employees;
    }

    public function getCost()
    {
        $cost = 0;
        foreach ($this->employees as $employee) {
            $cost += $employee->getSalary();
        }

        return $cost;
    }


    public function accept(Visitor $visitor)
    {
        return $visitor->visitDepartment($this);
    }
}
