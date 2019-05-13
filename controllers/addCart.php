<?php
    session_start();

    require 'models/db.php';
    require 'models/user.php';
    require 'models/product.php';
    require 'models/cart.php';

    $user = User::getUserByLogin($_SESSION['login']);
    $product = Product::getProductById($_POST['idProduct']);

    Cart::add($user->get('id'), $_POST['idProduct']);

    $productArray = array('name' => $product->get('name'), 'price' => $product->get('price'));
    echo json_encode($productArray);
?>