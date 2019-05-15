<?php 
    session_start();
    require 'models/db.php';

    if(isset($_GET['id'])){
        require 'models/order.php';
        if($order = Order::getorder($_GET['id']))
            if($order[0]['idStatus'] == 2){
                $id = $_GET['id'];
                $total[0] = $order[0]['total'];
                require 'views/order.php';
            }
    }

    require 'models/cart.php';
    $total = Cart::getTotal($_SESSION['id']);
    if($total[0] == '')
        header('Location: index');
    else if(isset($_POST['adresse']) && isset($_POST['pays']) && isset($_POST['code']) && isset($_POST['ville']))
        if($_POST['adresse'] == '' || $_POST['pays'] == '' || $_POST['code'] == '' || $_POST['ville'] == ''){
            $_SESSION['formFail'] = true;
            header('Location: shipping');
        }
        else{
            $_SESSION['orderValid'] = false;
            require 'models/order.php';
            $adress = $_POST['adresse'].' '.$_POST['code'].' '.$_POST['ville'].' '.$_POST['pays'];
            $id = Order::add($_SESSION['id'], $total['total'], $adress);
            $cart = Cart::getFromUserId($_SESSION['id']);
            foreach ($cart as $product) {
                Order::save($id,$product['idProduct'],$product['price']);
            }
            Cart::rmAll($_SESSION['id']);
            require 'views/order.php';
        }
    else
        header('Location: index');
?>