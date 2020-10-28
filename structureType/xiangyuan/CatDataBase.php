<?php
namespace xiangyuan;

include_once 'Cat.php';
include_once 'CatVariation.php';
class CatDataBase{

    private $cats = [];

    private $variations = [];

    /**
     * When adding a cat to the database, we look for an existing cat variation
     * first.
     */
    public function addCat($name, $age, $owner, $breed, $image, $color, $texture, $fur, $size) {

        $variation = $this->getVariation($breed, $image, $color, $texture, $fur, $size);
        $this->cats[] = new Cat($name, $age, $owner, $variation);
        echo "CatDataBase: Added a cat ($name, $breed).\n";
    }

    public function getVariation($breed, $image, $color, $texture, $fur, $size
    ) {
        $key = $this->getKey(get_defined_vars());

        if (!isset($this->variations[$key])) {
            $this->variations[$key] =
                new CatVariation($breed, $image, $color, $texture, $fur, $size);
        }

        return $this->variations[$key];
    }

    private function getKey($data)
    {
        return md5(implode("_", $data));
    }

    public function findCat($query)
    {
        foreach ($this->cats as $cat) {
            if ($cat->matches($query)) {
                return $cat;
            }
        }
        echo "CatDataBase: Sorry, your query does not yield any results.";
    }

}
