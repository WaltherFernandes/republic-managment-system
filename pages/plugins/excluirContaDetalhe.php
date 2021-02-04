<?php

    require '../../vendor/autoload.php';
    use \App\Entity\rep;

    $idConta = $_GET['idConta'];

    $obRep = new rep;

    $obRep->excluirRateiosPorConta($idConta);
    $obRep->excluirHistoricos($idConta);
    $obRep->excluirConta($idConta);

    header('Location: ../contaTabela.php')



?>