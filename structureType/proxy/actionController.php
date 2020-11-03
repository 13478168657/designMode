<?php

namespace proxy;

include_once 'Downloader.php';
include_once 'SimpleDownloader.php';
include_once 'CachingDownloader.php';

class actionController{

    public function clientCode(Downloader $subject)
    {

        $result = $subject->download("http://example.com/");

        // Duplicate download requests could be cached for a speed gain.

        $result = $subject->download("http://example.com/");

        // ...
    }

}

echo "Executing client code with real subject:\n";
$realSubject = new SimpleDownloader();
$action = new actionController();

$action->clientCode($realSubject);

echo "\n";

echo "Executing the same client code with a proxy:\n";
$proxy = new CachingDownloader($realSubject);
$action->clientCode($proxy);