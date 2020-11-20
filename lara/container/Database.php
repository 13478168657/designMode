<?php

namespace container;

include_once 'Log.php';
class Database implements Log{


    public function write()
    {
        // TODO: Implement write() method.

        echo 'database file ....success';
    }
}