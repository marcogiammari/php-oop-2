<?php 

require __DIR__ . '/models/Category.php';
require __DIR__ . '/models/Product.php';
require __DIR__ . '/models/Food.php';


$food1 = new Food('Kibble', 5, new Category('Cats', '&#x1f408;'));
$food1->setWeight(2.5);
$food1->setThumb('img/kibble.jpeg');

$food2 = new Food('Natural Trainer', 2.5, new Category('Dogs', '&#128021;'));
$food2->setWeight(0.5);
$food2->setThumb('img/natural-trainer.jpg');

$products = [$food1, $food2];

?>