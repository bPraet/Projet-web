<?php
  $title = "Inscription";
  include "header.php";
  if($_SESSION['formFail'] == true){
    echo "<div class='alert alert-danger' role='alert'>Tous les champs n'ont pas été remplis</div>";
    $_SESSION['formFail'] = false;
  }
  if($_SESSION['dbFail'] == true){
    echo "<div class='alert alert-danger' role='alert'>Utilisateur déjà inscrit...</div>";
    $_SESSION['dbFail'] = false;
  }
 ?>

 <div id="inscriptionForm">
    <form action="add" method="post" class="d-flex flex-column" required>
      <input type="text" name="login" placeholder="Login" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <input type="text" name="name" placeholder="Nom" required>
      <input type="text" name="firstname" placeholder="Prenom" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="submit" name="submit" value="Valider" required>
    </form>
 </div>

 <?php
  include "footer.php";
 ?>
