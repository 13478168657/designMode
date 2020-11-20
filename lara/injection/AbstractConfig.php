<?php

namespace injection;


abstract class AbstractConfig{


    protected $storage;

    public function __construct($storage)
    {
        $this->storage = $storage;
    }

}