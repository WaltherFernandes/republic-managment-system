 <!-- Cabeçalho -->
 <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-1" id='title'>Exlusão de morador</h1>
      <h3 class="mb-5" id='title'>Tem certeza que deseja excluir a conta <strong><em><?=$obConta->descricao?></em></strong></h3>
      <form id="formulario" action="plugins/contaExcluir" method="post" enctype="multipart/form-data">
        <input type="hidden" id="idConta" name="idConta" value="<?=$_POST['idEx']?>">
        <div class="row">
            <a class="btn col-md-6 btn-primary" href="moradorTabela">Voltar</a>
            <button type="submit" name="excluir" id="excluir" class="col-md-6 btn btn-danger float-right">Excluir</button>
        </div>
      </form>
    </div>
    <div class="overlay"></div>
  </header>