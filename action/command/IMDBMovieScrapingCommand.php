<?php

namespace command;

include_once 'WebScrapingCommand.php';

class IMDBMovieScrapingCommand extends WebScrapingCommand{

    public function parse($html)
    {
        if (preg_match("|<h1 itemprop=\"name\" class=\"\">(.*?)</h1>|", $html, $matches)) {
            $title = $matches[1];
        }
        echo "IMDBMovieScrapingCommand: Parsed movie $title.\n";
    }
}