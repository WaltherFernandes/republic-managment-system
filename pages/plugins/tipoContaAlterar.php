<?php

    require '../../vendor/autoload.php';

    use App\Entity\rep;

    if(isset($_POST['tipo'])){
        $obRep = new rep;
        $idTipo = $_POST['idTipo'];
        $obRep->tipo = $_POST['tipo'];

        $obRep->atualizarTipo($idTipo);

        header('location: ../tipoContaTabela');
        exit;
    }

?>