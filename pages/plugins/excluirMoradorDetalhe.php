<?php

    require '../../vendor/autoload.php';
    use \App\Entity\rep;

    $idMorador = $_GET['idMorador'];

    $obRep = new rep;

    $obRep->excluirRateiosPorMorador($idMorador);
    $contas = $obRep->getContas('idMoradorResponsavel = ' . $idMorador);
    foreach ($contas as $conta) {
        $obRep->excluirRateiosPorConta($conta->idConta);
        $obRep->excluirHistoricos($conta->idConta);
        $obRep->excluirConta($conta->idConta);
    }
    $obRep->excluirHistoricosPorMorador($idMorador);

    header('Location: ../contaTabela.php')



?>