<?php
    session_start();
    if(!isset($_SESSION['dbFail']))
        $_SESSION['dbFail'] = false;
    if(!isset($_SESSION['formFail']))
        $_SESSION['formFail'] = false;
    
    require 'views/inscription.php';
?>