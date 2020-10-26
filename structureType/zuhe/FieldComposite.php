<?php

namespace zuhe;

include_once 'FormElement.php';
abstract class FieldComposite extends FormElement{

    protected $fields = [];

    public function add(FormElement $field)
    {
        $name = $field->getName();

        $this->fields[$name] = $field;
    }

    public function remove(FormElement $component){

        $this->fields = array_filter($this->fields, function ($child) use ($component) {
            return $child != $component;
        });
    }

    public function setData($data)
    {
        foreach ($this->fields as $name => $field) {
            if (isset($data[$name])) {
                $field->setData($data[$name]);
            }
        }
    }

    public function getData(){

        $data = [];

        foreach ($this->fields as $name => $field) {
            $data[$name] = $field->getData();
        }

        return $data;
    }

    public function render()
    {
        $output = "";

        foreach ($this->fields as $name => $field) {
            $output .= $field->render();
        }

        return $output;
    }
}