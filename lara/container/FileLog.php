<?php

namespace container;

include_once 'Log.php';
class FileLog implements Log{


    public function write()
    {
        // TODO: Implement write() method.

        echo 'filelog ....successs';
    }
}