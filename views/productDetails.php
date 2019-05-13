<?php
    $title = $product->get('name');
    include 'views/header.php';
?>
<h1><?php echo $title ?></h1>
<div id="product" class="d-flex justify-content-center">
    <img src="<?php echo $product->get('link') ?>" id="imgProduct">
    <div id="productDetails" class="float-right">
        <div id="productPrice"><h3>Prix: </h3><h4><?php echo $product->get('price') ?><h4></div><br>
        <div id="productBrand"><h3>Marque: </h3><h4><?php echo $product->get('brand') ?></h4></div><br>
        <div id="productSize"><h3>Taille: </h3><h4><?php echo $product->get('size') ?></h4></div><br>
        <div id="productColor"><h3>Couleur: </h3><h4><?php echo $product->get('color') ?></h4></div>
        <?php
            if(isset($_SESSION['login']))
                echo '<button class="card-link" id="'.$product->get('id').'">Add to cart</button>';
        ?>
    </div>
</div>
<?php
    include 'views/footer.php';
?>