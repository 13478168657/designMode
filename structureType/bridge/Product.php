<?php

namespace bridge;

class Product{

    private $id, $title, $description, $image, $price;

    public function __construct($id,$title,$description,$image, $price) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage(){
        return $this->image;
    }

    public function getPrice(){
        return $this->price;
    }

}