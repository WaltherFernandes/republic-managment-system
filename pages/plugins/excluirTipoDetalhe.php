<?php

    require '../../vendor/autoload.php';
    use \App\Entity\rep;

    $idTipo = $_GET['idTipo'];

    $obRep = new rep;

    $contas = $obRep->getContas('idTipo = ' . $idTipo);
    foreach ($contas as $conta) {
        $obRep->excluirRateiosPorConta($conta->idConta);
        $obRep->excluirHistoricos($conta->idConta);
        $obRep->excluirConta($conta->idConta);
    }
    $obRep->excluirTipo($idTipo);

    header('Location: ../contaTabela.php')



?>