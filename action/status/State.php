<?php

namespace status;

include_once 'Context.php';
abstract class State
{
    /**
     * @var Context
     */
    protected $context;

    public function setContext(Context $context)
    {
        $this->context = $context;
    }

    abstract public function handle1();

    abstract public function handle2();
}