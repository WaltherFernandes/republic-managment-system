<?php

  require '../../vendor/autoload.php';

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
    $obRep->senha = password_hash($_POST['senha1'], PASSWORD_DEFAULT);

    if(!$_FILES['imagem']['name'] == null){
        $dir = '../../img/users/';
        $temp = $_FILES['imagem']['tmp_name'];
        $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $newName = md5($obRep->CPF).".".$ext;
        move_uploaded_file($temp, $dir.$newName);
    
        $obRep->foto = md5($obRep->CPF).".".$ext; 
    }else{
      $obRep->foto = $_POST['fotoTEMP'];
    }
    $obRep->contato = $_POST['contatos'];




    $obRep->atualizarMorador($_POST['idMorador']);


    header('location: ../moradorTabela');
    exit;
  }

?>