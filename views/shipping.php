<?php
  $title = "Livraison";
  include "header.php";
  if (isset($_SESSION['formFail']))
    if($_SESSION['formFail'] == true){
        echo "<div class='alert alert-danger' role='alert'>Tous les champs n'ont pas été remplis</div>";
        $_SESSION['formFail'] = false;
    }
  $cart = Cart::getTotal($_SESSION['id']);
  if($cart['total'] != 0)
    echo '<h1>Livraison</h1>
    <div>
        <form action="shipping" method="post" class="d-flex flex-column" required>
          <input type="text" name="adresse" placeholder="Adresse" required>
          <input type="text" name="code" placeholder="Code Postal" required>
          <input type="text" name="ville" placeholder="Ville" required>
          <input type="text" name="pays" placeholder="Pays" required>
          <input type="submit" name="submit" value="Valider" required>
        </form>
    </div>';
  else
    echo 'Panier vide...';
    
  include "footer.php";
 ?>