<?php 

trait Material {
    public $material;

	public function setMaterial($material) {
        $this->material = $material;
    }

    public function getMaterial() {
        return $this->material;
    }
}

?>