<?php
    $title = "Admin";
    include 'views/header.php';
    if(!isset($_SESSION['login']) || $_SESSION['admin'] != 'yes')
      header('Location: index');
?>
<script type="text/javascript">adminmenu()</script>
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