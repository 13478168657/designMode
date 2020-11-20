<?php

namespace injection;

include_once 'Connection.php';
include_once 'ArrayConfig.php';
class test{

    protected $config;
    protected $source;

    public function setUp()
    {
        $this->source = include "config.php";
        $this->config = new ArrayConfig($this->source);
    }

    public function testDependencyInjection()
    {
        $connection = new Connection($this->config);
        $connection->connect();
        print_r($connection->getHost());
    }
}

$ts = new test();

$ts->setUp();
$ts->testDependencyInjection();