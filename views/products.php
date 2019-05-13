<?php
    $title = 'Products';
    include 'views/header.php';
?>
<h1><?php echo $title ?></h1>
<div id="productList">
<?php
foreach ($products as $product) {
    echo '
    <div class="card" data-aos="fade-up">
        <div class="card-body">
        <a href="productDetails?id='.$product['id'].'"><div class="description">
            Dimensions: '.$product['size'].'cm<br>
            Couleur: '.$product['color'].'<br>
            Marque: '.$product['brand'].'<br>
        </div></a>
        <img class="imgProduct" id="'.$product['name'].'Image" src="'.$product['link'].'">
        <h5 class="card-title">'.$product['name'].'</h5>
        <h6 class="card-subtitle mb-2 text-muted">'.$product['price'].'€</h6>';
        if(isset($_SESSION['login']))
            echo '<button class="card-link" id="'.$product['id'].'">Add to cart</button>';
        echo '</div></div>';
}
?>
</div>

<?php
    include 'views/footer.php';
?>