<?php

    require '../vendor/autoload.php';
    use \App\Entity\rep;

    //Validação da ID
    if(!isset($_POST['idEx']) or !is_numeric($_POST['idEx'])){
        header('location: ./contaTabela');
        exit;
    }

    $obConta = rep::getConta($_POST['idEx']);
    
    if(!$obConta instanceof rep){
        header('location: ./contaTabela');
        exit;
    } 

    $idConta = $_POST['idEx'];

    $obRat = rep::getRateios();

    $check = 0;

    foreach($obRat as $rateios){
        if($rateios->idConta == $idConta){
            $check = 1;
        }
    }

    $obRep = rep::getConta($idConta);

    if($check == 1){
        echo "
            <script>
                if(confirm('Existem dados associados a essa conta. Deseja excluí-los?')){
                    location.href='./plugins/excluirContaDetalhe?idConta=$idConta'
                }else{
                    location.href='./contaTabela.php'
                }
            </script>
        ";
        exit;
    }

    include('./includes/header.php');
    include('./includes/contaExcluirBody.php');
    include('./includes/footer.php');

?>