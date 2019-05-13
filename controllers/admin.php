<?php
    require 'models/db.php';
    require 'models/user.php';
    require 'models/product.php';
    require 'models/order.php';
    $users = User::getAll();
    $products = Product::getAll();
    $bestProducts = Product::getBestProducts();
    $orders = Order::getAll();
    $currentYearOrders = Order::getCurrentYearOrders();
    if(isset($_GET['action']))
        if($_GET['action'] == 'rmUser'){
            User::remove($_GET['id']);
            header('Location: admin?section=users');
        }
        else if($_GET['action'] == 'rmProduct'){
            Product::remove($_GET['id']);
            unlink('ressources/images/'.$_GET['name'].'.jpg');
            header('Location: admin?section=products');
        }
        else if($_GET['action'] == 'paidOrder'){
            Order::paid($_GET['id']);
            header('Location: admin?section=orders');
        }
    if(isset($_GET['section']))
        if($_GET['section'] == 'modifyUser'){
            $user = User::getUserByLogin($_GET['login']);
        }
        else if($_GET['section'] == 'modifyProduct'){
            $product = Product::getProductById($_GET['id']);
        }

    
    require 'views/admin.php';
?>