<?php
    require 'models/db.php';
    require 'models/inbox.php';
    $inbox = inbox::getMessages();

    if(isset($_GET['action']))
        if($_GET['action'] == 'rm'){
            inbox::rmMessage($_GET['id']);
            header('Location: inbox');
        }

    require 'views/inbox.php';

?>