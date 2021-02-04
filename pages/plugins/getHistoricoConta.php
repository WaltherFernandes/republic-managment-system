<?php

    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    $idConta = $_POST['idConta'];
    $historicos = rep::getHistoricos('idConta = '. $idConta);

    $table = "";
    foreach($historicos as $historico){
        $data = date_create($historico->data);
        $dataFormatada = date_format($data, 'd/m/Y H:i:s');
        $estado = "";

        if($historico->estado == 0){
            $estado = "Abriu";
        }elseif($historico->estado == 1){
            $estado = "Fechou";
        }else{
            $estado = "Reabriu";
        }
        
        $obMorador = rep::getMorador($historico->idMorador);

        $table .= "<tr> <td>{$estado}</td> <td>{$dataFormatada}</td> <td>{$obMorador->nome}</td> </tr>";
    }
    echo $table;


?>