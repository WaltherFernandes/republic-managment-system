<?php

    session_start();
    if(!isset($_SESSION['msg'])){
        $_SESSION['msg'] = '';
    }

    include('./includes/header.php');
    include('./includes/loginBody.php');
    $_SESSION['msg'] = '';
