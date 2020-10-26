<?php

namespace zuhe;


abstract class FormElement{

    protected $name;
    protected $title;
    protected $data;

    public function __construct($name, $title)
    {
        $this->name = $name;
        $this->title = $title;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setData($data){

        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    abstract public function render();
}