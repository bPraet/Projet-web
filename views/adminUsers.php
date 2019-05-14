<script src="ressources/search.js"></script>
<a href="?section=addUser"><button type="button" class="btn btn-outline-primary">Ajouter administrateur</button></a>
<input class="form-control" id="searchBar" type="text" placeholder="Recherche" onkeyup="searchUser()">
<ul class="list-group" id="ulUsers">
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
                echo "<div class='alert alert-danger' role='alert'>Login déjà utilisé, modification impossible...</div>";
                $_SESSION['fail'] = false;
            }
        foreach ($users as $user) {
            echo '<li class="list-group-item"><span>'.$user['id'].' '.$user['login'].          
            '</span><a href="?section=modifyUser&login='.$user['login'].'"><button type="button" class="btn btn-outline-success float-right">Modifier</button></a>';
            if($_SESSION['login'] != $user['login'])
                echo '<a href="?section=users&action=rmUser&id='.$user['id'].'"><button type="button" class="btn btn-outline-danger float-right" Onclick="return confirm(\'Etes-vous sûr ?\')">Supprimer</button></a></li>';
            else
                echo '</li>';
        }
    ?>
</ul>