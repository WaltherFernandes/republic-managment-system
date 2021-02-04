<?php
    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    $idMorador = $_POST['idMorador'];
    $senhaAtual  = $_POST['senhaAtual'];
    $novaSenha = $_POST['novaSenha1'];

    $morador = rep::getMorador($idMorador);

    if(password_verify($senhaAtual, $morador->senha)){
        rep::updatePass($idMorador, password_hash($novaSenha, PASSWORD_DEFAULT));
    }else{
        echo "<script>alert('A senha atual não estava correta'); location.href='../moradorTabela';</script>";
    }

    echo "<script>alert('Senha alterada com sucesso!'); location.href='./logout';</script>";
?>