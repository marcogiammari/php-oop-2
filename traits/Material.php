<?php 

trait Material {
    private $material;

	public function setMaterial($material) {
        $this->material = $material;
    }

    public function getMaterial() {
        return $this->material;
    }
}

?>