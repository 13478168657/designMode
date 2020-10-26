<?php

namespace decorator;

include_once 'InputFormat.php';
class TextFormat implements InputFormat{

    protected $inputFormat;

    public function __construct(InputFormat $inputFormat)
    {

        $this->inputFormat = $inputFormat;
    }

    /**
     * Decorator delegates all work to a wrapped component.
     */
    public function formatText($text)
    {
        return $this->inputFormat->formatText($text);
    }
}