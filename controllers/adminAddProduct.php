<?php
    session_start();
    require 'models/db.php';
    require 'models/product.php';

    $products = Product::getAll();

    $_POST['name'] = ucwords(strtolower($_POST['name']));
    $_POST['color'] = ucwords(strtolower($_POST['color']));
    $_POST['brand'] = ucwords(strtolower($_POST['brand']));

    foreach ($products as $product) {
        if($product['name'] == $_POST['name'] || $_FILES['picture']['type'] != 'image/jpeg'){
            $_SESSION['fail'] = true;
            header('Location: admin?section=addProduct');
            exit();
        }
    }

    Product::add($_POST['name'], $_POST['price'], $_POST['size'], $_POST['color'], $_POST['brand']);

    $_POST['name'] = strtolower($_POST['name']);
    $path='ressources/images/'.$_POST['name'].'.jpg';
    move_uploaded_file($_FILES['picture']['tmp_name'],$path);
    $_SESSION['success'] = true;
    header('Location: admin?section=addProduct');
?>