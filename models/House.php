<?php 

require_once __DIR__ . '/../traits/Material.php';

class House extends Product {

    use Material;

    public $size;

	public function setSize($width, $height) {
        $this->size = $width.'cm' . ' x ' . $height.'cm';
    }

    public function getSize() {
        return $this->size;
      }
}

?>