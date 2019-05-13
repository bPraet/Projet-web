<?php
    require 'models/db.php';
    require 'models/product.php';

    Product::modifyBestProduct($_POST['idNewBest'], $_POST['idOldBest']);
?>