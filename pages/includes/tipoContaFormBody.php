<!-- Formulario -->
  <section class="content-section bg-light" id="sobre">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
            <h2>Formulário de cadastro</h2>
            <hr/>
            <form id="formulario" action="plugins/<?=$action?>" method="post" enctype="multipart/form-data">
              <input type="hidden" id="idTipo" name="idTipo" value="<?=$idTipo?>">
              <div class="row form-group">
                  <div class="col-md-12">
                      <label for="tipo">Tipo de conta</label>  
                      <input class="form-control" id="tipo" name="tipo" value="<?=$tipo?>" type="text" placeholder="Digite aqui o tipo">
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
  </section>