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
    else{//graphique
      //test
      $chartValues = array_fill(1, 12, 0);
      foreach ($currentYearOrders as $order) {
        $chartValues[$order['mois']] = $order['nb'];
      }
      echo "<script type='text/javascript'>
      function chart(){
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',
    
            // The data for our dataset
            data: {
                labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'aout', 'septembre', 'octobre', 'novembre', 'décembre'],
                datasets: [{
                    label: 'Ventes de l\'année',
                    backgroundColor: 'rgb(100, 200, 250)',
                    borderColor: 'rgb(30, 150, 210)',
                    data: [".$chartValues[1].", ".$chartValues[2].", ".$chartValues[3].",
                    ".$chartValues[4].", ".$chartValues[5].", ".$chartValues[6].",
                    ".$chartValues[7].", ".$chartValues[8].", ".$chartValues[9].",
                    ".$chartValues[10].", ".$chartValues[11].", ".$chartValues[12]."]
                }]
            },
    
            // Configuration options go here
            options: {}
        });
    }
    
    $(document).ready(function () {
        chart();
    });
      </script><div id='chartContainer'><canvas id='chart'></canvas></div>";
    }
    

    include 'views/footer.php';
?>