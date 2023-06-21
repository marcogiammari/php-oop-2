<?php 

class Category {
	public $name;
	public $icon;

	public function __construct($name, $icon)
	{
		$this->name = $name;
        $this->icon = $icon;
	}
}

?>