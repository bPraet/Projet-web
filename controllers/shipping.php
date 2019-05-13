<?php 
    session_start();
    require 'models/db.php';
    require 'models/cart.php';

    if(isset($_POST['adresse']) && isset($_POST['pays']) && isset($_POST['code']) && isset($_POST['ville']))
        if($_POST['adresse'] == '' || $_POST['pays'] == '' || $_POST['code'] == '' || $_POST['ville'] == ''){
            $_SESSION['formFail'] = true;
        }
        else{
            require 'models/order.php';
            $adress = $_POST['adresse'].' '.$_POST['code'].' '.$_POST['ville'].' '.$_POST['pays'];
            $total = Cart::getTotal($_SESSION['id']);
            $id = Order::add($_SESSION['id'], $total['total'], $adress);

            $cart = Cart::getFromUserId($_SESSION['id']);
            foreach ($cart as $product) {
                Order::save($id,$product['idProduct'],$product['price']);
            }
            
            Cart::rmAll($_SESSION['id']);
            header('Location: order');
        }

    
    require 'views/shipping.php';
?>