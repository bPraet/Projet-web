<?php
    require 'models/db.php';
    require 'models/user.php';
    session_start();
    if($_POST['login'] == '' || $_POST['name'] == '' || $_POST['firstname'] == '' || $_POST['email'] == ''){
        $_SESSION['formFail'] = true;
        header('Location: admin?section=users');
        exit();
    }
    else if(User::getUserByLogin($_POST['login']) && $_GET['login'] != $_POST['login']){
        header('Location: admin?section=users');
        $_SESSION['fail'] = true;
        exit();
    }
    $user = User::getUserByLogin($_GET['login']);
    if($_SESSION['login'] == $_GET['login']) //Si changement du login de l'admin connecté actualiser avec le nouveau
        $_SESSION['login'] = $_POST['login'];
    $user->set('login',$_POST['login']);
    $user->set('name',$_POST['name']);
    $user->set('firstname',$_POST['firstname']);
    $user->set('email',$_POST['email']);

    $user->modify();
    $_SESSION['success'] = true;
    header('Location: admin?section=users');

?>