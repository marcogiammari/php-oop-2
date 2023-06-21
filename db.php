<?php 

require __DIR__ . '/models/Category.php';
require __DIR__ . '/models/Product.php';
require __DIR__ . '/models/Food.php';
require __DIR__ . '/models/Dogkennel.php';
require __DIR__ . '/models/Toy.php';


$food1 = new Food('Kibble', 5, new Category('Cats', '&#x1f408;'));
$food1->setWeight(2.5);
$food1->setThumb('img/kibble.jpeg');

$food2 = new Food('Natural Trainer', 2.5, new Category('Dogs', '&#128021;'));
$food2->setWeight(0.5);
$food2->setThumb('img/natural-trainer.jpg');

$kennel1 = new Dogkennel('Dog Kennel', 20, new Category('Dogs', '&#128021;'));
$kennel1->setSize(15);
$kennel1->setThumb('img/dog-kennel.jpg');

$toy1 = new Toy('Scratcher', 8, new Category('Cats', '&#x1f408;'));
$toy1->setMaterial('Cotton');
$toy1->setThumb('img/scratcher.jpg');



$products = [$food1, $food2, $kennel1, $toy1];

?>