<?php

    require '../../app/DB/Database.php';

    require '../../app/entity/rep.php';

    use App\Entity\rep;

    $CPF = $_POST['CPF'];
    $idMorador = $_POST['idMorador'];

    $obMoradores = rep::getMoradores("CPF = '{$CPF}' AND idMorador <> {$idMorador}", null, null);

    if(sizeof($obMoradores) > 0){
        echo "false";
    }else{
        echo "true";
    }
?>