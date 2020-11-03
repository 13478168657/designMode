<?php

namespace command;

include_once 'Queue.php';
include_once 'IMDBGenresScrapingCommand.php';
class actionController{


    public function __construct()
    {

    }

}

$queue = Queue::get();

//print_r($queue);

if ($queue->isEmpty()) {
    $queue->add(new IMDBGenresScrapingCommand());
}

$queue->work();