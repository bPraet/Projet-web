<?php
    require 'models/db.php';
    require 'models/product.php';
    $products = Product::getAll();
    require 'views/products.php';
?>