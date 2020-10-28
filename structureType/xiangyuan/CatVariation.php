<?php


namespace xiangyuan;


class CatVariation{

    public $breed;

    public $image;

    public $color;

    public $texture;

    public $fur;

    public $size;


    public function __construct($breed, $image, $color, $texture, $fur, $size) {
        $this->breed = $breed;
        $this->image = $image;
        $this->color = $color;
        $this->texture = $texture;
        $this->fur = $fur;
        $this->size = $size;
    }

    public function renderProfile($name, $age, $owner)
    {
        echo "= $name =\n";
        echo "Age: $age\n";
        echo "Owner: $owner\n";
        echo "Breed: $this->breed\n";
        echo "Image: $this->image\n";
        echo "Color: $this->color\n";
        echo "Texture: $this->texture\n";
    }
}