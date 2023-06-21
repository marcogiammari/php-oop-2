<?php 

class Food extends Product {
    public $weight;

	public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getWeight() {
        return $this->weight;
    }
}

?>