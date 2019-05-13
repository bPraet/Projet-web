<script src="ressources/search.js"></script>

<a href="?section=addProduct"><button type="button" class="btn btn-outline-primary">Ajouter produit</button></a>
<h3>Best products (slide): </h3>

<select id="bestProduct1">
<?php
foreach ($products as $product) {
    if($product['id'] == $bestProducts[0]['idProduct'])
        echo '<option value="'.$product['id'].'" selected>'.$product['name'].'</option>';
    else
        echo '<option value="'.$product['id'].'">'.$product['name'].'</option>';
}
?>
</select>
<select id="bestProduct2">
<?php
foreach ($products as $product) {
    if($product['id'] == $bestProducts[1]['idProduct'])
        echo '<option value="'.$product['id'].'" selected>'.$product['name'].'</option>';
    else
        echo '<option value="'.$product['id'].'">'.$product['name'].'</option>';
}
?>
</select>
<select id="bestProduct3">
<?php
foreach ($products as $product) {
    if($product['id'] == $bestProducts[2]['idProduct'])
        echo '<option value="'.$product['id'].'" selected>'.$product['name'].'</option>';
    else
        echo '<option value="'.$product['id'].'">'.$product['name'].'</option>';
}
?>
</select>

<input class="form-control" id="searchBar" type="text" placeholder="Recherche" onkeyup="searchProduct()">
<ul class="list-group" id="ulProducts">
    
<?php 
    if(isset($_SESSION['formFail']))
        if($_SESSION['formFail'] == true){
            echo "<div class='alert alert-danger' role='alert'>Modification impossible, tous les champs n'ont pas été remplis</div>";
            $_SESSION['formFail'] = false;
        }
    if(isset($_SESSION['success']))
        if($_SESSION['success'] == true){
            echo "<div class='alert alert-success' role='alert'>Opération effectuée avec succès !</div>";
            $_SESSION['success'] = false;
        }
    if(isset($_SESSION['fail']))
        if($_SESSION['fail'] == true){
            echo "<div class='alert alert-danger' role='alert'>Nom déjà utilisé, modification impossible...</div>";
            $_SESSION['fail'] = false;
        }
    foreach ($products as $product) {
        echo '<li class="list-group-item"><span>'.$product['name'].'
        <a href="?section=modifyProduct&id='.$product['id'].'"><button type="button" class="btn btn-outline-success float-right">Modifier</button></a>
        <a href="?section=products&action=rmProduct&id='.$product['id'].'&name='.$product['name'].'"><button type="button" class="btn btn-outline-danger float-right" Onclick="return confirm(\'Etes-vous sûr ?\')">Supprimer</button></a></li>';
    }

?>
</ul>