<?php
    session_start();
    require './plugins/checkLogin.php';
    require './includes/header.php';
?>
  <section class="content-section bg-light" id="sobre">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
            <h2>Alterar senha</h2>
            <hr/>
            <form id="formAltSenha" action="plugins/mudarSenha" method="post" enctype="multipart/form-data">
                <input type="hidden" id="idMorador" name="idMorador" value= "<?=$_SESSION['user']?>">
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="nome">Senha atual</label>  
                        <input class="form-control" id="senhaAtual" name="senhaAtual" value="" type="password" placeholder="Informe a senha atual">
                    </div>	
                    <p style="margin-left: 1.7rem; color:red;">Caso tenha esquecido sua senha, deslogue e clique em esqueci minha senha</p>
                </div>	
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="nome">Nova senha</label>  
                        <input class="form-control" id="novaSenha1" name="novaSenha1" value="" type="password" placeholder="Informe a nova senha">
                    </div>
                    <div class="col-md-6">	
                        <label for="nasc">Repita a senha</label>
                        <input class="form-control" id="novaSenha2" name="novaSenha2" value="" type="password" placeholder="Repita a nova senha">
                    </div>	
                </div>	
                <div class="row form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary float-left" onclick="goBack()">Voltar</button>
                        <button type="reset"  class="btn btn-danger float-right">Cancelar</button>	
                        <button type="submit" class="btn btn-success float-right mx-1">Salvar</button>	
                    </div>											
                </div>	
            </form>
        </div>
      </div>
    </div>
  </section><br><br><br><br><br><br><br><br><br>
<?php
    require './includes/footer';
?>
  


