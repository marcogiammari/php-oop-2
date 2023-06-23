<?php 

header('Content-Type: application/json');

$cart = file_get_contents("cart.json");

if (!empty($_POST)) {
    $cartData = json_decode($cart, true);
    if (isset($_POST['newItem'])) {
        $cartData[] = $_POST['newItem'];
    } elseif (isset($_POST['reset'])) {
        $cartData = [];
    }
    file_put_contents("cart.json", json_encode($cartData));
    $cart = json_encode($cartData);
}

echo $cart;

?>