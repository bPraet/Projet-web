<?php
    session_start();
    if(!isset($_SESSION['loginFail']))
        $_SESSION['loginFail'] = false;
    require 'views/login.php';
?>