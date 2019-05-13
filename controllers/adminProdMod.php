<?php
    require 'models/db.php';
    require 'models/product.php';
    session_start();
    if($_POST['name'] == '' || $_POST['price'] == '' || $_POST['size'] == '' || $_POST['color'] == '' || $_POST['brand'] == ''){
        $_SESSION['formFail'] = true;
        header('Location: admin?section=products');
        exit();
    }

    $_POST['name'] = ucwords(strtolower($_POST['name']));
    $_POST['color'] = ucwords(strtolower($_POST['color']));
    $_POST['brand'] = ucwords(strtolower($_POST['brand']));
    if(Product::getProductByName($_POST['name']) && $_GET['name'] != $_POST['name']){
        header('Location: admin?section=products');
        $_SESSION['fail'] = true;
        exit();
    }

    $product = Product::getProductByName($_GET['name']);

    $product->set('name',$_POST['name']);
    $product->set('price',$_POST['price']);
    $product->set('size',$_POST['size']);
    $product->set('color',$_POST['color']);
    $product->set('brand',$_POST['brand']);

    $_POST['name'] = strtolower($_POST['name']);
    $path='ressources/images/'.$_POST['name'].'.jpg';
    if($_FILES['picture']['type'] == 'image/jpeg'){
        unlink('ressources/images/'.$_GET['name'].'.jpg');
        move_uploaded_file($_FILES['picture']['tmp_name'], $path);
    }
    else
        rename("ressources/images/".$_GET['name'].".jpg", "ressources/images/".$_POST['name'].".jpg");

    $product->modify();

    $_SESSION['success'] = true;
    header('Location: admin?section=products');

?>