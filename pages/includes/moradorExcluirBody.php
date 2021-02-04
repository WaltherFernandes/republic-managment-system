 <!-- Cabeçalho -->
 <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-1">Exlusão de morador</h1>
      <h3 class="mb-5">Tem certeza que deseja excluir o morador <strong><em><?=$obMorador->nome?></em></strong></h3>
      <form id="formulario" action="plugins/moradorExcluir" method="post" enctype="multipart/form-data">
        <input type="hidden" id="idMorador" name="idMorador" value="<?=$_POST['idEx']?>">
        <div class="row">
            <a class="btn col-md-6 btn-primary" href="moradorTabela">Voltar</a>
            <button type="submit" name="excluir" id="excluir" class="col-md-6 btn btn-danger float-right">Excluir</button>
        </div>
      </form>
    </div>
    <div class="overlay"></div>
  </header>