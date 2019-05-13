<?php
  $title = "login";
  include "header.php";
  if($_SESSION['loginFail'] == true){
    echo "<div class='alert alert-danger' role='alert'>Identifiants incorrects</div>";
    $_SESSION['loginFail'] = false;
  }
 ?>

<div id="logForm">
   <form action="connection" method="post" class="d-flex flex-column">
     <input type="text" name="login" placeholder="Login" required>
     <input type="password" name="password" placeholder="Mot de passe" required>
     <input type="submit" name="submit" value="Connexion">
   </form>
   <br /><a href="inscription">Pas encore inscrit ?</a>
</div>

<?php
  include "footer.php";
?>
