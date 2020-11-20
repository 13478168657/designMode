<?php

namespace container;

include_once 'Log.php';

include_once 'FileLog.php';
include_once 'Database.php';

class User{

    protected $log;
    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    public function login(){

        echo 'login .... success';
        $this->log->write();
    }
}