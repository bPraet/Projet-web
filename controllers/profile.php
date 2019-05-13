<?php
    session_start();
    require 'models/db.php';
    require 'models/user.php';
    require 'models/order.php';
    $orders = Order::getAllUser($_SESSION['id']);
    $user = User::getUserByLogin($_SESSION['login']);
    require 'views/userMod.php';
?>