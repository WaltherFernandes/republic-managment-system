<?php

  require '../../vendor/autoload.php';
  require './geraSenha.php';

  use \App\Entity\rep;
   
  /**
   * Recupera os dados do formulário e coloca no objeto
   */
  if(isset($_POST['nome']) && isset($_POST['email'])){
    $obRep = new rep;
    $obRep->nome = $_POST['nome'];
    $obRep->CPF = $_POST['CPF'];
    $obRep->dataNascimento = $_POST['nasc'];
    $obRep->celular = $_POST['celular'];
    $obRep->email = $_POST['email'];
    $senhaTemp = gerar_senha();
    $obRep->contato = $_POST['contatos'];
    $obRep->senha = password_hash($senhaTemp, PASSWORD_DEFAULT);

    /**
     * Faz a validação das imagens
     */
    if(!$_FILES['imagem']['name'] == null){
        $dir = '../../img/users/';
        $temp = $_FILES['imagem']['tmp_name'];
        $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $newName = md5($obRep->CPF).".".$ext;
        move_uploaded_file($temp, $dir.$newName);
    
        $obRep->foto = md5($obRep->CPF).".".$ext; 
    }else{
      $obRep->foto = "../default.jpeg";
    }

    /**
     * Dados do e-mail
     */
		$destinatario = $obRep->email;
		$assunto = "Criação de conta - DebRepublicas";
        $msg = "Olá {$obRep->nome}!
        Você criou uma conta em nosso sistema e aqui está sua senha.
        Sua senha: {$senhaTemp}.
        
        Atenciosamente, equipe DevRepublicas."; 
    $headers = "From: noreply@devrepublicas.com"; 
		
		$sendMail = mail($destinatario, $assunto, $msg, $headers); 

    /**
     * Finalização
     */
		if($sendMail){

      echo "<script>alert('Conta criada! O e-mail com sua senha foi enviado.'); location.href='../login';</script>"; 
      $obRep->cadastrarMorador();

		}else{
      echo "<script>alert('Erro ao enviar e-mail. A sua conta não foi criado.');</script>";
      exit;
		}



    header('location: ../moradorTabela');
    exit;
  }

?>