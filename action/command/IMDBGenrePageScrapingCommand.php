<?php


namespace command;

include_once 'WebScrapingCommand.php';
include_once 'Queue.php';
include_once 'IMDBMovieScrapingCommand.php';
include_once 'IMDBGenrePageScrapingCommand.php';
class IMDBGenrePageScrapingCommand extends WebScrapingCommand{

    private $page;

    public function __construct($url, $page = 1)
    {
        parent::__construct($url);
        $this->page = $page;
    }

    public function getURL()
    {
        return $this->url . '?page=' . $this->page;
    }

    /**
     * Extract all movies from a page like this:
     * https://www.imdb.com/search/title?genres=sci-fi&explore=title_type,genres
     */
    public function parse($html)
    {
        preg_match_all("|href=\"(/title/.*?/)\?ref_=adv_li_tt\"|", $html, $matches);
        echo "IMDBGenrePageScrapingCommand: Discovered " . count($matches[1]) . " movies.\n";

        foreach ($matches[1] as $moviePath) {
            $url = "https://www.imdb.com" . $moviePath;
            Queue::get()->add(new IMDBMovieScrapingCommand($url));
        }

        // Parse the next page URL.
        if (preg_match("|Next &#187;</a>|", $html)) {
            Queue::get()->add(new IMDBGenrePageScrapingCommand($this->url, $this->page + 1));
        }
    }

}