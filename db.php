<?php 

require __DIR__ . '/models/Category.php';
require __DIR__ . '/models/Product.php';
require __DIR__ . '/models/Food.php';
require __DIR__ . '/models/House.php';
require __DIR__ . '/models/Toy.php';

$cats = new Category('Cats', "fa-solid fa-cat");
$dogs = new Category('Dogs', 'fa-solid fa-dog');
$fishes = new Category('Fishes', 'fa-solid fa-fish');

$kibble = new Food('Kibble', 5, $cats);
$kibble->setWeight(2.5);
$kibble->setThumb('img/kibble.jpeg');

$natural_trainer = new Food('Natural Trainer', 2.5, $dogs);
$natural_trainer->setWeight(500, 'g');
$natural_trainer->setThumb('img/natural-trainer.jpg');

$kennel = new House('Dog Kennel', 20, $dogs);
$kennel->setSize(150, 200);
$kennel->setMaterial('Wood');
$kennel->setThumb('img/dog-kennel.jpg');

$scratcher = new Toy('Scratcher', 8,  $cats);
$scratcher->setMaterial('Cotton');
$scratcher->setThumb('img/scratcher.jpg');

$fish_bowl = new House('Fish Bowl', 12, $fishes);
$fish_bowl->setSize(100, 80);
$fish_bowl->setMaterial('Glass');
$fish_bowl-> setThumb('img/fish-bowl.jpeg');


$products = [$kibble, $natural_trainer, $kennel, $scratcher, $fish_bowl];

echo json_encode($products);

?>