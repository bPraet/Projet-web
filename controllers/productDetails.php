<?php

    require 'models/db.php';
    require 'models/product.php';

    $product = Product::getProductById($_GET['id']);

    require 'views/productDetails.php';

?>