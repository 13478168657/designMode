<?php

namespace facade;

class YouTube
{

    private $title;

    public function fetchVideo($url){
        /* ... */
        $this->title = $url;
        return $this;
    }

    public function saveAs($path,$name) {
        /* ... */

        return 'success';
    }

    public function getTitle(){

        return $this->title;
    }

}


