<?php
    session_start();
    require 'models/db.php';
    require 'models/user.php';
    $_SESSION['loginFail'] = false;
    if($_POST['login'] == "" || $_POST['password'] == "" || User::getUserByLogin($_POST['login']) == ""){
        $_SESSION['loginFail'] = true;
        header('Location: login');
    }
    else{
        $user = User::getUserByLogin($_POST['login']);
        if(password_verify($_POST['password'], $user->get("password"))){
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['id'] = $user->get('id');
            if($user->get("statusId") == 1)
                $_SESSION['admin'] = "yes";
            else
                $_SESSION['admin'] = "no";
            header('Location: index');
        }
        else{
            $_SESSION['loginFail'] = true;
            header('Location: login');
        }
    }
?>