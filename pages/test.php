<?php
    session_start();

    if($_SESSION['user'] != 1){
        echo "<script>alert('Você não é um administrador para ficar aqui.'); location.href='./'</script>";
        exit;
    }

    require '../vendor/autoload.php';
    use \App\Entity\rep;

    $conta = rep::getConta(23);

    echo $conta->dataVencimento.'<br>';
    echo date('Y-m-d').'<br>';
    if(strtotime($conta->dataVencimento) > strtotime(date('Y-m-d'))){
        echo "maior";
    }else{
        echo 'menor';
    }
    exit;

?>