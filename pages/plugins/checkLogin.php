<?php

    require '../vendor/autoload.php';

    use \App\Entity\rep;

    if(isset($_COOKIE['usuarioID'])){
        $_SESSION['user'] = base64_decode($_COOKIE['usuarioID']);
        $objMorador = rep::getMorador($_SESSION['user']);
        return; 
    }
    if(!isset($_SESSION['user'])){
        header('location: ./login');
    }else{
        if($_SESSION['user'] != 'admin'){
            $objMorador = rep::getMorador($_SESSION['user']);
        }
    }

?>