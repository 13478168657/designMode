<?php

namespace command;

include_once 'WebScrapingCommand.php';
include_once 'Queue.php';
include_once 'IMDBGenrePageScrapingCommand.php';
class IMDBGenresScrapingCommand extends WebScrapingCommand{

    public function __construct()
    {
        $this->url = "https://www.imdb.com/feature/genre/";
        parent::__construct($this->url);
    }

    /**
     * Extract all genres and their search URLs from the page:
     * https://www.imdb.com/feature/genre/
     */
    public function parse($html)
    {
        preg_match_all("|href=\"(https://www.imdb.com/search/title\?genres=.*?)\"|", $html, $matches);
        echo "IMDBGenresScrapingCommand: Discovered " . count($matches[1]) . " genres.\n";

        foreach ($matches[1] as $genre) {
            Queue::get()->add(new IMDBGenrePageScrapingCommand($genre));
        }
    }
}