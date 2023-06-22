<?php 

class Food extends Product {
    public $weight;

	public function setWeight($weight, $unit = 'kg') {
        $this->weight = $weight . $unit;
    }

    public function getWeight() {
        return $this->weight;
    }
}

?>