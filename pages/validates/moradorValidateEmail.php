<?php

    require '../../app/DB/Database.php';

    require '../../app/entity/rep.php';

    use App\Entity\rep;

    $email = $_POST['email'];
    $idMorador = $_POST['idMorador'];

    $obMoradores = rep::getMoradores("email = '{$email}' AND idMorador <> {$idMorador}", null, null);

    if(sizeof($obMoradores) > 0){
        echo "false";
    }else{
        echo "true";
    }
?>