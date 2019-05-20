<?php
    session_start();
    require 'models/db.php';
    require 'models/user.php';
    require 'models/order.php';
    $orders = Order::getAllUser($_SESSION['id']);
    $user = User::getUserByLogin($_SESSION['login']);
    if(isset($_GET['action']))
        if($_GET['action'] == 'rmOrder'){
            Order::cancel($_GET['id']);
            header('Location: profile');
        }
    require 'views/userMod.php';
?>