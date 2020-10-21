<?php

namespace singleton;

class Singleton{

    static private  $instances = [];
    static private  $instance = null;

    protected function __construct() {

    }

    protected function __clone() {

    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    static public function getInstance(){

        $subclass = static::class;//获取当前调用类的对象类名;self::class:获取所在类的类名

        if (!isset(self::$instances[$subclass])) {

            self::$instances[$subclass] = new static();
        }

        return self::$instances[$subclass];
    }
}
