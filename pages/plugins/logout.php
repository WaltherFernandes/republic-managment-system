<?php
    session_start();
    if(isset($_COOKIE['usuarioID'])){
        setcookie('usuarioID', null, 1, "/");
    }
    unset($_SESSION['user']);
    $_SESSION['msg'] = '<br><div class="alert alert-success text-center">Desconectado</div>';

    header("location: ../login");
?>