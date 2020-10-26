<?php

namespace zuhe;

include_once 'FieldComposite.php';
class Form extends FieldComposite{


    protected $url;

    public function __construct($name, $title, $url)
    {
        parent::__construct($name, $title);
        $this->url = $url;
    }

    public function render()
    {
        $output = parent::render();
        return "<form action=\"{$this->url}\">\n<h3>{$this->title}</h3>\n$output</form>\n";
    }
}