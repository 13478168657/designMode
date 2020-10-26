<?php

namespace decorator;

include_once 'InputFormat.php';

class TextInput implements InputFormat{

    public function formatText($text)
    {

        return $text;
    }

}