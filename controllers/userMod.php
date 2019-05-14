<?php
    require 'models/db.php';
    require 'models/user.php';
    require 'models/order.php';
    session_start();
    if($_POST['login'] == '' || $_POST['name'] == '' || $_POST['firstname'] == '' || $_POST['email'] == ''){
        $_SESSION['formFail'] = true;
        header('Location: index');
        exit();
    }
    else if(User::getUserByLogin($_POST['login']) && $_GET['login'] != $_POST['login']){
        header('Location: index');
        $_SESSION['fail'] = true;
        exit();
    }
    $user = User::getUserByLogin($_GET['login']);
    if($_SESSION['login'] == $_GET['login'])
        $_SESSION['login'] = $_POST['login'];
    if($_POST['password'] != "")
        $user->set('password',password_hash($_POST['password'], PASSWORD_DEFAULT));
    $user->set('login',$_POST['login']);
    $user->set('name',$_POST['name']);
    $user->set('firstname',$_POST['firstname']);
    $user->set('email',$_POST['email']);

    $user->modify();
    $_SESSION['success'] = true;
    header('Location: index');

?>