<?php
    $title = 'Contact';
    include 'views/header.php';
?>
<h1><?php echo $title ?></h1>
<form action="contactSubmit" method="post" class="d-flex flex-column">
     <input type="text" name="name" placeholder="Nom" required>
     <input type="text" name="firstname" placeholder="Prénom" required>
     <input type="email" name="mail" placeholder="E-mail" required>
     <textarea rows = "5" cols = "60" name = "content" placeholder="Message"></textarea>
     <input type="submit" name="submit" value="Envoyer">
   </form>
<?php
    include 'views/footer.php';
?>