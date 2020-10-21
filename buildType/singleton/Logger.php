<?php

namespace singleton;

include_once 'Singleton.php';
class Logger extends Singleton{


    private $fileHandle;

    protected function __construct()
    {
        $this->fileHandle = fopen('php://stdout', 'w');
    }

    public function writeLog($message)
    {
        $date = date('Y-m-d H:i:s');
        fwrite($this->fileHandle, "$date: $message\n");
    }

    public static function log($message)
    {
        $logger = static::getInstance();
        $logger->writeLog($message);
    }
}