<?php

namespace xiangyuan;

include_once 'CatVariation.php';

class Cat{

    public $name;

    public $age;

    public $owner;

    private $variation;

    public function __construct($name, $age, $owner, CatVariation $variation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->owner = $owner;
        $this->variation = $variation;
    }

    public function matches($query)
    {
        foreach ($query as $key => $value) {
            if (property_exists($this, $key)) {
                if ($this->$key != $value) {
                    return false;
                }
            } elseif (property_exists($this->variation, $key)) {
                if ($this->variation->$key != $value) {
                    return false;
                }
            } else {
                return false;
            }
        }

        return true;
    }

    public function render()
    {
        $this->variation->renderProfile($this->name, $this->age, $this->owner);
    }
}