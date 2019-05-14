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

<div id="addUserForm">
    <form action="adminAddUser" method="post" class="d-flex flex-column">
        Login<input type="text" name="login" required>
        Password<input type="password" name="password" required>
        Name<input type="text" name="name" required>
        Firstname<input type="text" name="firstname" required>
        Email<input type="email" name="email" required>
        <input type="submit" name="submit" value="Valider">
    </form>
 </div>