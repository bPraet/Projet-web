<?php
    session_start();
    require 'models/db.php';
    require 'models/order.php';

    if($_SESSION['orderValid'] != true)
        header('Location: index');
    $_SESSION['orderValid'] = false;

    Order::paid($_GET['id']);
    Order::addTransactionId($_GET['id'], $_GET['ref']);
    $_SESSION['orderComplete'] = true;
    header('Location: index');
?>