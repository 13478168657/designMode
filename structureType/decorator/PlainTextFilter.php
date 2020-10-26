<?php

namespace decorator;

include_once 'TextFormat.php';
class PlainTextFilter extends TextFormat{

    public function formatText($text)
    {
//        $text = parent::formatText($text);
        return strip_tags($text);
    }
}