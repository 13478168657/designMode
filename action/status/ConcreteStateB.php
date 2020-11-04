<?php

namespace status;
include_once 'State.php';
include_once 'ConcreteStateA.php';
class ConcreteStateB extends State
{
    public function handle1()
    {
        echo "ConcreteStateB handles request1.\n";
    }

    public function handle2()
    {
        echo "ConcreteStateB handles request2.\n";
        echo "ConcreteStateB wants to change the state of the context.\n";
        $this->context->transitionTo(new ConcreteStateA());
    }
}