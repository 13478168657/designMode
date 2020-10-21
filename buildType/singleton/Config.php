<?php

namespace singleton;

include_once 'Singleton.php';
class Config extends Singleton
{
    private $hashmap = [];

    public function getValue($key)
    {
        return $this->hashmap[$key];
    }

    public function setValue($key, $value)
    {
        $this->hashmap[$key] = $value;
    }
}