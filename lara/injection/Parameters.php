<?php

namespace injection;


interface Parameters{

    public function get($key);


    public function set($key, $value);
}