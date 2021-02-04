<?php
    session_start();

    require '../vendor/autoload.php';
    require './plugins/checkLogin.php';

    use \App\Entity\rep;
    
    $obMorador = rep::getMorador($_SESSION['user']);
    $nomes = $obMorador->nome;
    $aux = explode(' ', $nomes);
    $nome = $aux[0];

    $contas = rep::getContas();
    $idConta = 0;

   

    $mesAtual = date("m");
    $anoAtual = date("Y");
    $primeiroDia = "01";
    $ultimoDia = cal_days_in_month(CAL_GREGORIAN, $mesAtual , $anoAtual);
    $inicio = date($anoAtual . "-" . $mesAtual . "-" . $primeiroDia);
    $termino = date($anoAtual . "-" . $mesAtual . "-" . $ultimoDia);

    include('./includes/header.php');
    include('./includes/indexBody.php');
    include('./includes/footer.php');

?>

<script src="../js/indexGrafs.js"></script>