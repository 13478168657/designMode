<?php

namespace visitor;


include_once 'Visitor.php';

class Company implements Entity
{
    private $name;

    /**
     * @var Department[]
     */
    private $departments;

    public function __construct($name, $departments)
    {
        $this->name = $name;
        $this->departments = $departments;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDepartments()
    {
        return $this->departments;
    }

    // ...

    public function accept(Visitor $visitor)
    {
        // See, the Company component must call the visitCompany method. The
        // same principle applies to all components.
        return $visitor->visitCompany($this);
    }
}
