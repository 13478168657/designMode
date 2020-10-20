<?php

namespace prototype;


include_once 'Author.php';
class Page{

    private $title;

    private $body;

    private $comments = [];

    private $date;

    public function __construct($title,$body,Author $author)
    {
        $this->title = $title;
        $this->body = $body;
        $this->author = $author;
        $this->author->addToPage($this);
        $this->date = time();
    }

    public function addComment($comment){

        $this->comments[] = $comment;
    }

    public function __clone()
    {
        $this->title = "Copy of " . $this->title;
        $this->author->addToPage($this);
        $this->comments = [];
        $this->date = new \DateTime();
    }
}
