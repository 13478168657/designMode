<?php

namespace command;

include_once 'Command.php';

include_once 'Queue.php';
abstract class WebScrapingCommand implements Command{

    public $id;

    public $status = 0;

    /**
     * @var string URL for scraping.
     */
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getURL()
    {
        return $this->url;
    }

    /**
     * Since the execution methods for all web scraping commands are very
     * similar, we can provide a default implementation and let subclasses
     * override them if needed.
     *
     * Psst! An observant reader may spot another behavioral pattern in action
     * here.
     */
    public function execute()
    {
        $html = $this->download();
        $this->parse($html);
        $this->complete();
    }

    public function download()
    {
        $html = file_get_contents($this->getURL());
        echo "WebScrapingCommand: Downloaded {$this->url}\n";

        return $html;
    }

    abstract public function parse($html);

    public function complete()
    {
        $this->status = 1;
        Queue::get()->completeCommand($this);
    }
}