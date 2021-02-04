<?php

    require '../../app/DB/Database.php';

    require '../../app/entity/rep.php';

    use App\Entity\rep;

    $tipo = $_POST['tipo'];
    $idTipo = $_POST['idTipo'];

    $obTipos = rep::getTipos("nome = '{$tipo}' AND idTipo <> '{$idTipo}'");

    if(sizeof($obTipos) > 0){
        echo "false";
    }else{
        echo "true";
    }
?>