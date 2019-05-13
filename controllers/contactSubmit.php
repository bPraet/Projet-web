<?php
    session_start();
    require 'models/db.php';
    require 'models/contact.php';

    Contact::send($_POST['name'], $_POST['firstname'], $_POST['mail'], $_POST['content']);

    $_SESSION['sent'] = true;
    header('Location: index');   

?>