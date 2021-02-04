<?php
    session_start();

    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    $email = $_POST['emailLog'];
    $senha = $_POST['senhaLog'];

    $obMorador = rep::getMoradores("email = '". $email . "'");

    if(sizeof($obMorador) > 0){
        if(password_verify($senha, $obMorador[0]->senha)){
            $_SESSION['msg'] = '';
            $_SESSION['user'] = $obMorador[0]->idMorador;
            if(isset($_POST['manter'])){
                setcookie("usuarioID", base64_encode($obMorador[0]->idMorador), time()+ (86400 * 30), "/");
            }
            header("Location: ../");
        }else{
            $_SESSION['msg'] = '<br><div class="alert alert-danger text-center">Dados incorretos</div>';
            header("location: ../login");
        }
    }else{
        $_SESSION['msg'] = '<br><div class="alert alert-danger text-center">Dados incorretos ou inexistentes</div>';
        header("location: ../login");
    }
?>