<?php
    $email = $_POST['email'];

    require '../../vendor/autoload.php';
    require './geraSenha.php';

    use \App\Entity\rep;

    $moradores = rep::getMoradores("email = '".$email."'");

	if($moradores != NULL){		
        $novaSenha = gerar_senha();
        
		$destinatario = $email;
		$assunto = "Recuperar senha - DebRepublicas";
        $msg = "Olá {$moradores[0]->nome}!
                    Você solicitou a mudança de senha e aqui está.
                    Nova senha: {$novaSenha}.
                    
                    Atenciosamente, equipe DevRepublicas."; 
		$headers = "From: noreply@devrepublicas.com"; 
		
		$sendMail = mail($destinatario, $assunto, $msg, $headers); 

		if($envio){
            rep::updatePass($moradores[0]->idMorador, password_hash($novaSenha, PASSWORD_DEFAULT));

			echo "<script>alert('O e-mail com sua nova senha foi enviado.'); location.href='../login';</script>"; 

		}else{
			echo "<script>alert('Erro ao enviar e-mail. A senha não foi alterada.');</script>";
		}
		
	}else{
		echo "<script>alert('E-mail inválido!'); location.href='../login';</script>"; 		
    }
?>