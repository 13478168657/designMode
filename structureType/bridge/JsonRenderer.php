<?php

namespace bridge;

include_once 'Renderer.php';

class JsonRenderer implements Renderer{

    public function renderTitle($title)
    {
        return '"title": "' . $title . '"';
    }

    public function renderTextBlock($text)
    {
        return '"text": "' . $text . '"';
    }

    public function renderImage($url)
    {
        return '"img": "' . $url . '"';
    }

    public function renderLink($url, $title)
    {
        return '"link": {"href": "' . $url . '", "title": "' . $title . '"}';
    }

    public function renderHeader()
    {
        return '';
    }

    public function renderFooter()
    {
        return '';
    }

    public function renderParts($parts)
    {
        return "{" . implode(",", array_filter($parts)) . "}";
    }
}