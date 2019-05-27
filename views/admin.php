<?php
    $title = "Admin";
    include 'views/header.php';
    if(!isset($_SESSION['login']) || $_SESSION['admin'] != 'yes')
      header('Location: index');
?>
<h1 class="text-center">Panneau d'administration</h1>
<ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link" href="?section=users">Utilisateurs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?section=products">Produits</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?section=orders">Commandes</a>
  </li>
</ul><hr>

<?php
    if(isset($_GET['section'])){
        switch ($_GET['section']) {
            case 'users':
                include 'views/adminUsers.php';
                break;

            case 'addUser':
                include 'views/adminAddUser.php';
                break;
            
            case 'modifyUser':
                include 'views/adminUserMod.php';
                break;
            
            case 'products':
                include 'views/adminProducts.php';
                break;

            case 'addProduct':
                include 'views/adminAddProduct.php';
                break;

            case 'modifyProduct':
                include 'views/adminProdMod.php';
                break;

            case 'orders':
                include 'views/adminOrders.php';
                break;
        }
    }
    else{//graphiques
      include 'ressources/charts.php';
    }
    

    include 'views/footer.php';
?>