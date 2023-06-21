<?php 

class Product {
    public $name;
    public $price;
    public $category;
    public $thumb;

    public function __construct($name, $price, Category $category) 
    {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function setThumb($thumb) {
        $this->thumb = $thumb;
    }
}

?>