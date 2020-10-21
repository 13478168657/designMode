<?php

namespace prototype;


class Author{

    private $name;

    private $pages = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addToPage(Page $page)
    {
        $this->pages[] = $page;
    }
}