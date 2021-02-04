<?php

    require '../../vendor/autoload.php';

    use App\Entity\rep;

    if(isset($_POST['tipo'])){
        $obRep = new rep;
        $obRep->tipo = $_POST['tipo'];

        $obRep->cadastrarTipo();

        header('location: ../tipoContaTabela');
        exit;
    }

?>