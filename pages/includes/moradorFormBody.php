  <!-- Formulario -->
  <section class="content-section bg-light" id="sobre">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
            <h2>Formulário de cadastro</h2>
            <hr/>
            <form id="formulario" action="plugins/<?=$action?>" method="post" enctype="multipart/form-data">
                <input type="hidden" id="idMorador" name="idMorador" value= "<?=$id?>">
                <input type="hidden" id="fotoTEMP" name="fotoTEMP" value= "<?=$imagem?>">
                <div class="row form-group">
                    <div class="col-md-12">
                            <p class="mc-auto">Foto</p> 
                            <label for="imagem">
                                <div class="hovereffect">
                                    <img class="rounded mx-auto d-block img-responsive" 
                                        id="fotoPrin" 
                                        name="fotoPrin" 
                                        src="<?=$foto?>" 
                                        style="object-fit: cover; width: 150px; height: 150px; margin: auto;"
                                    >
                                    <div class="overlay">
                                        <h2>Foto de perfil</h2>
                                        <p>ESCOLHER</p>
                                    </div>
                                </div>
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" value="<?=$imagem?>" id="imagem" name="imagem" onchange="previewImagem()" lang="pt-BR" style="visibility: hidden;" accept=".png, .jpg, .jpeg">
                            </div>
                        </div>
                    </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="nome">Nome</label>  
                        <input class="form-control" id="nome" name="nome" value="<?=$nome?>" type="text" placeholder="Informe o nome">
                    </div>
                    <div class="col-md-3">	
                        <label for="nasc">Data de nascimento</label>
                        <input class="form-control" id="nasc" name="nasc" value="<?=$nasc?>" type="date">
                    </div>	
                    <div class="col-md-3">
                        <label for="CPF">CPF</label>  
                        <input class="form-control" id="CPF" name="CPF" value="<?=$cpf?>" type="text" placeholder="Informe o CPF">
                    </div>
                    <div class="col-md-3">
                        <label for="celular">Celular</label>  
                        <input class="form-control" id="celular" name="celular" value="<?=$celular?>" type="text" placeholder="Informe o número de celular">
                    </div>
                </div>	
                <div class="form-group">
                    <label for="Contatos">Contatos</label>
                    <textarea class="form-control" id="contatos" name="contatos" rows="3" placeholder="Digite aqui informações importantes, como contatos"><?=$contatos?></textarea>
                </div>
                <hr/>
                <div class="row form-group">
                    <?=$formEmail ?>	
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
  </section>

  


