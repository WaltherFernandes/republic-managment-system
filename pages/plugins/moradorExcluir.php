<?php

  require '../../vendor/autoload.php';

  use \App\Entity\rep;

  if(isset($_POST['excluir'])){
    $idMorador = $_POST['idMorador'];
      
    $obRep = rep::getMorador($idMorador);

    if($obRep->foto != "../default.jpeg"){
      unlink('../../img/users/'.$obRep->foto);
    }
    session_start();
    if($obRep->idMorador == $_SESSION['user']){
        echo "<script>alert('O usuario que esta conectado é o mesmo que foi excluido. Deslogando...');</script>";
        unset($_SESSION['user']);
        echo "<script>location.href='../login';</script>"; 
    }

    $obRep->excluirMorador($idMorador);

    header('location: ../moradorTabela');
    exit;
  }

?>