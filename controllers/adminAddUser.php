<?php
    session_start();
    require 'models/db.php';
    require 'models/user.php';

    if(User::getUserByLogin($_POST['login'])){
        $_SESSION['fail'] = true;
    }
    else{
        User::addAdmin($_POST['login'], $_POST['password'], $_POST['name'], $_POST['firstname'], $_POST['email']);
        $_SESSION['success'] = true;
    }
    
    header('Location: admin?section=addUser');

?>