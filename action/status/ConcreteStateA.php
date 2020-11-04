<?php

namespace status;

include_once 'State.php';
include_once 'ConcreteStateB.php';
class ConcreteStateA extends State
{
    public function handle1()
    {
        echo "ConcreteStateA handles request1.\n";
        echo "ConcreteStateA wants to change the state of the context.\n";
        $this->context->transitionTo(new ConcreteStateB());
    }

    public function handle2()
    {
        echo "ConcreteStateA handles request2.\n";
    }
}