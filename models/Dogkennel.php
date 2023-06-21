<?php 

class Dogkennel extends Product {
    public $size;

	public function setSize($size) {
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }
}

?>