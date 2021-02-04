<?php
    session_start();

    require '../vendor/autoload.php';
    require './plugins/checkLogin.php';

    use \App\Entity\rep;
    $formEmail = "";
    $isSameUser = false;
    $id = 0;
    $foto = "../img/default.jpeg";
    $imagem = "";
    $nome = "";
    $nasc = "";
    $cpf = "";
    $celular = "";
    $contatos = "";
    $email = "";
    $senha = "";
    $rsenha = "";
    $action = "moradorSalvar";
    $moradores = rep::getMoradores();

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $morador  = rep::getMorador($_POST['id']);
        $foto = "../img/users/".$morador->foto;
        $imagem = $morador->foto;
        $nome = $morador->nome;
        $nasc =$morador->dataNascimento;
        $cpf = $morador->CPF;
        $celular = $morador->celular;
        $contatos = $morador->contato;
        $email = $morador->email;
        if(isset($_SESSION['user'])){
            if($id == $_SESSION['user']){   
                $isSameUser = true;
            }
        }
        $action = "moradorAlterar";
    }
    
    if($isSameUser){
        $formEmail .= '<div class="col-md-8">
                            <label for="email">E-mail</label>  
                            <input class="form-control" id="email" name="email" value="'.$email.'" type="text" placeholder="Informe o E-mail">
                        </div>
                        <div class="col-md-4">
                        <a href="./alterarSenha" class="btn btn-outline-secondary text-center" style=" height: 2.7rem; margin-top: 1.6rem; text-decoration: none; color: black;"><p>Alterar a senha</p></a>
                        </div>';
    }else{
       $formEmail .= '<div class="col-md-12">
                        <label for="email">E-mail</label>  
                        <input class="form-control" id="email" name="email" value="'.$email.'" type="text" placeholder="Informe o E-mail">
                    </div>';
    }

    include('./includes/header.php');
    include('./includes/moradorFormBody.php');
    include('./includes/footer.php');

?>