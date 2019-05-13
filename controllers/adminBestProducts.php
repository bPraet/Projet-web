<?php
    require 'models/db.php';
    require 'models/product.php';
    $bestProducts = Product::getBestProducts();
    require 'views/adminBestProducts.php';
?>