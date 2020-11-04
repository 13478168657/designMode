<?php


namespace status;
include_once 'ConcreteStateA.php';
include_once 'Context.php';
class actionController{


}


$context = new Context(new ConcreteStateA());
$context->request1();
$context->request2();