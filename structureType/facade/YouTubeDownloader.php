<?php

namespace facade;

include_once 'YouTube.php';
include_once 'FFMpeg.php';
class YouTubeDownloader
{
    protected $youtube;
    protected $ffmpeg;

    /**
    * It is handy when the Facade can manage the lifecycle of the subsystem it
    * uses.
    */
    public function __construct($youtubeApiKey)
    {
        $this->youtube = new YouTube($youtubeApiKey);
        $this->ffmpeg = new FFMpeg();
    }

    /**
    * The Facade provides a simple method for downloading video and encoding it
    * to a target format (for the sake of simplicity, the real-world code is
    * commented-out).
    */
    public function downloadVideo($url)
    {
        echo "Fetching; video metadata from youtube...\n";
         $title = $this->youtube->fetchVideo($url)->getTitle();
        echo $title;

        echo "\n\n\n";
        echo "Saving video file to a temporary file...\n";

        echo $this->youtube->saveAs($url, "video.mpg");
        echo "\n\n\n";
        echo "Processing source video...\n";
        // $video = $this->ffmpeg->open('video.mpg');
        echo "Normalizing and resizing the video to smaller dimensions...\n";
        // $video
        //     ->filters()
        //     ->resize(new FFMpeg\Coordinate\Dimension(320, 240))
        //     ->synchronize();
        echo "Capturing preview image...\n";
        // $video
        //     ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
        //     ->save($title . 'frame.jpg');
        echo "Saving video in target formats...\n";
        // $video
        //     ->save(new FFMpeg\Format\Video\X264(), $title . '.mp4')
        //     ->save(new FFMpeg\Format\Video\WMV(), $title . '.wmv')
        //     ->save(new FFMpeg\Format\Video\WebM(), $title . '.webm');
        echo "Done!\n";
    }
}

$tube = new YouTubeDownloader('ceshiceshi');

$tube->downloadVideo('www.baidu.com');

