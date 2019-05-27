<?php 
  if(session_status() == PHP_SESSION_NONE){ //Condition pour empêcher deux appels de session_start
    session_start(); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title ?></title>
    <meta charset="utf-8">
    <link rel="icon" href="ressources/images/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php require 'config.php'; echo $clientId; ?>&currency=EUR"></script>
    <script src="ressources/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Dokdo" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
    <link rel="stylesheet" href="ressources/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  </head>
  <body>
  <div id="container" class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <span class="navbar-brand">Pluch</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact">Contact</a>
          </li>
          <?php
            if(!empty($_SESSION['login']) && $_SESSION['admin'] == "yes")
              echo '<li class="nav-item"><a class="nav-link" href="admin">Admin</a></li>
              <li class="nav-item"><a class="nav-link" href="inbox">Messages</a></li>';
          ?>
        </ul>
      </div>
    </nav>
    
    <?php
      if(empty($_SESSION['login'])){
        echo '<a href="login"><button type="button" name="login" id="loginButton" class="btn btn-info">Connexion</button></a>';
      }
      else{
        $uri = explode('/',$_SERVER['REQUEST_URI']);
        if(end($uri) != 'shipping' && end($uri) != 'order'){
          require 'models/cart.php';
          $cartProducts = Cart::getFromUserId($_SESSION['id']);
          $cartTotal = Cart::getTotal($_SESSION['id']);
          echo '<span onclick="openCart()"><i class="fas fa-shopping-cart fa-2x" id="cartButton"></i></span>
          <div id="cart"><a href="shipping"><button type="button" name="cartValidation" id="cartValidButton" class="btn btn-outline-success float-right">Acheter</button></a><h2>Panier</h2>';
          if($cartTotal['total'] != 0)
            echo 'Total: <span id="total">'.$cartTotal['total'].'€</span>';
          else
            echo '<span id="total">Total: 0.00€</span>';

          foreach ($cartProducts as $cartProduct) {
            echo '<li class="list-group-item item" id="'.$cartProduct['name'].'">'.$cartProduct['name'].' '.$cartProduct['price'].'€<span class="close">&#10006</span></li>';
          }
          echo '</div>';
        }
        echo '<a href="profile"><i class="fas fa-user fa-2x" id="profileButton"></i></a>
        <a href="logout"><button type="button" name="login" id="loginButton" class="btn btn-info">Déconnexion</button></a>';
      }
    ?>