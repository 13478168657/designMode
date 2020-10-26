<?php

namespace zuhe;

include_once 'FormElement.php';
class Input extends FormElement{

    private $type;

    public function __construct( $name, $title, $type)
    {
        parent::__construct($name, $title);
        $this->type = $type;
    }

    public function render()
    {
        return "<label for=\"{$this->name}\">{$this->title}</label>\n" .
        "<input name=\"{$this->name}\" type=\"{$this->type}\" value=\"{$this->data}\">\n";
    }
}