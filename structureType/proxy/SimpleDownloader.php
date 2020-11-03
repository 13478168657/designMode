<?php

namespace proxy;

include_once 'Downloader.php';
class SimpleDownloader implements Downloader{


    public function download($url)
    {
        echo "Downloading a file from the Internet.\n";
        $result = file_get_contents($url);
        echo "Downloaded bytes: " . strlen($result) . "\n";

        return $result;
    }
}