<?=session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
</body>
</html>


<?php

    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    if(!isset($_POST['id'])){
        header('location: ../');
    }

    $obConta = rep::getConta($_POST['id']);
    $obConta->cadastrarConta();
    $obRecente = rep::getLastId();
    $obRateios = rep::getRateios('idConta = ' . $_POST['id']);

    $obRep = new rep;
    foreach($obRateios as $rateio){
        $obRep->idMorador = $rateio->idMorador;
        $obRep->idConta = $obRecente->idConta;
        $obRep->valor = $rateio->valor;
        $obRep->situacao = $rateio->situacao;

        $obRep->cadastrarRateio();
    }

    echo "
        <script src='../../js/jquery.js'></script>
        <script src='../../js/funcoes.js'></script>
        <script>
            var id = ".$obRecente->idConta."; 
            chamarPagDup(id, '../contaForm'); 
        </script>";

?>  