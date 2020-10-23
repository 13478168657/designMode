<?php

namespace bridge;


abstract class Page{

    protected $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function changeRenderer(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    abstract public function view();
}