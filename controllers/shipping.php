<?php 
    session_start();
    require 'models/db.php';
    require 'models/cart.php';
    $cart = Cart::getTotal($_SESSION['id']);
    require 'views/shipping.php';
?>