<?php
    session_start();
    require 'models/db.php';
    require 'models/user.php';
    if($_POST['login'] == '' || $_POST['password'] == '' || $_POST['name'] == '' || $_POST['firstname'] == ''
    || $_POST['email'] == ''){
        $_SESSION['formFail'] = true;
        header('Location: inscription');
    }
    
    if(User::getUserByLogin($_POST['login'])){
        $_SESSION['dbFail'] = true;
        header('Location: inscription');
    }
    
    else{
        User::add($_POST['login'], $_POST['password'], $_POST['name'], $_POST['firstname'], $_POST['email']);
        $user = User::getUserByLogin($_POST['login']);
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['id'] = $user->get('id');
        $_SESSION['admin'] = "no";
        header('Location: index');
    }
?>
