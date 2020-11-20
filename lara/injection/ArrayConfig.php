<?php


namespace injection;

include_once 'AbstractConfig.php';
include_once 'Parameters.php';
class ArrayConfig extends AbstractConfig implements Parameters{


    public function get($key, $default = null)
    {
        if (isset($this->storage[$key])) {
            return $this->storage[$key];
        }
        return $default;
    }

    /**
     * 设置参数
     *
     * @param string|int $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->storage[$key] = $value;
    }
}