<?php

  require '../../vendor/autoload.php';

  use \App\Entity\rep;

  if(isset($_POST['excluir'])){
    $idConta = $_POST['idConta'];
      
    $obRep = rep::getConta($idConta);
    
    $obRep->excluirHistoricos($idConta);

    $obRep->excluirConta($idConta);


    header('location: ../contaTabela');
    exit;
  }

?>