<?php
    if(isset($_SESSION['fail']))
        if($_SESSION['fail'] == true){
            echo "<div class='alert alert-danger' role='alert'>Ajout impossible !</div>";
                $_SESSION['fail'] = false;
        }
    if(isset($_SESSION['success']))
        if($_SESSION['success'] == true){
            echo "<div class='alert alert-success' role='alert'>Opération effectuée avec succès !</div>";
            $_SESSION['success'] = false;
        }
?>

<div id="addProductForm">
    <form action="adminAddProduct" method="post" class="d-flex flex-column" enctype="multipart/form-data">
      Nom<input type="text" name="name" required>
      Prix<input type="number" min="0.00" step="0.01" name="price" required>
      Image<input type="file" name="picture" accept="image/jpeg" required>
      Taille<input type="number" min="0.00" step="0.01" name="size" required>
      Couleur<input type="text" name="color" required>
      Marque<input type="text" name="brand" required>
      <input type="submit" name="submit" value="Valider">
    </form>
 </div>