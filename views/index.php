<?php
  $title = 'index';
  include "header.php";
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
  if(isset($_SESSION['sent']))
    if($_SESSION['sent'] == true){
      echo "<div class='alert alert-success' role='alert'>Votre message a bien été envoyé, nous vous contacterons dans les plus brefs délais</div>";
      $_SESSION['sent'] = false;
    }
  if(isset($_SESSION['fail']))
    if($_SESSION['fail'] == true){
      echo "<div class='alert alert-danger' role='alert'>Login déjà utilisé, modification impossible...</div>";
      $_SESSION['fail'] = false;
  }
?>

<!-- slide -->
<div id="slide" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#slide" data-slide-to="0" class="active"></li>
    <li data-target="#slide" data-slide-to="1"></li>
    <li data-target="#slide" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block slideImages" src=<?php echo '"'.$bestProducts[0]['link'].'"'?> alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block slideImages" src=<?php echo '"'.$bestProducts[1]['link'].'"'?> alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block slideImages" src=<?php echo '"'.$bestProducts[2]['link'].'"'?> alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon dark" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slide" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div id="container">
  <h1>Des peluches j'en veux toujours pluch !</h1><hr>
  <div class="pub">
    <img class="img-fluid float-left" src="ressources/images/placeholder.png">
    <p class="pubDescription"><h2 class="text-right">100% coton</h2>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
  <div class="pub" data-aos="fade-up">
    <img class="img-fluid float-right" src="ressources/images/placeholder.png">
    <h2 class="text-right">Anti-allergie et micro-aéré</h2>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
<?php
  include "footer.php";
?>