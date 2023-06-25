<?php 
session_start();
$id = $_SESSION["id"];

header('Content-Type: application/json');

$cart = file_get_contents("cart.json");

if (!empty($_POST)) {
    $cartData = json_decode($cart);
    if (isset($_POST['newItem'])) {
        if (!$cartData) {
            $cartData = new stdClass;
        }
        if (isset($cartData->$id)) {
            $cartData->$id->cartItems[] = $_POST['newItem'];
        } else {
            $cartData->$id = new stdClass;
            $cartData->$id->cartItems = [];
            $cartData->$id->cartItems[] = $_POST['newItem'];
        }
    } elseif (isset($_POST['reset'])) {
        $cartData->$id->cartItems = [];

    } elseif (isset($_POST['deleteItem'])) {
        array_splice($cartData->$id->cartItems, $_POST['deleteItem'], 1);
    }


    file_put_contents("cart.json", json_encode($cartData));
    $cart = json_encode($cartData->$id->cartItems);
    echo $cart;
}


?>