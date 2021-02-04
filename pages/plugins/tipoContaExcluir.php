<?php

  require '../../vendor/autoload.php';

  use \App\Entity\rep;

  if(isset($_POST['excluir'])){
    $idTipo = $_POST['idTipo'];

    $obRep = rep::getTipo($idTipo);

    $obRep->excluirTipo($idTipo);


    header('location: ../tipoContaTabela');
    exit;
  }

?>