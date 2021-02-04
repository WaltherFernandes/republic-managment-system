<?php
    session_start();

    require '../vendor/autoload.php';
    require './plugins/checkLogin.php';

    use \App\Entity\rep;

    $idTipo = 0;
    $tipo = "";
    $action = "tipoContaSalvar";

    if(isset($_POST['id'])){
        $action = "tipoContaAlterar";
        $idTipo = $_POST['id'];
        $obTipo = rep::getTipo($idTipo);
        $tipo = $obTipo->nome;
    }

    include_once('./includes/header.php');
    include_once('./includes/tipoContaFormBody.php');
    include_once('./includes/footer.php');

?>