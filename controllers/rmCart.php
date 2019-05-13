<?php
    session_start();

    require 'models/db.php';
    require 'models/user.php';
    require 'models/product.php';
    require 'models/cart.php';

    $user = User::getUserByLogin($_SESSION['login']);
    $product = Product::getProductByName($_POST['nameProduct']);

    Cart::rm($user->get('id'), $product->get('id'));

    echo $product->get('price');
?>