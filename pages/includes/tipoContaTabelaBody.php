<section class="content-section bg-light" id="sobre">
    <div class="container container-fluid">
        <div class="table-responsive">
            <div class="table-wrapper">
              <div class="row">
                <div class="col-md-6">
                  <h2>Tipos de conta</h2>
                </div>
                <div class="col-md-6">
                  <a class="btn btn-primary float-right" href="tipoContaForm">Novo cadastro</a>
                </div>
              </div><br>
              <?=$forms?>
                <table class="table table-striped table-hover table-bordered" id="tabela">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo de conta <i class="fa fa-sort"></i></th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?=$resultados?>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>   
  </section>
  <br><br><br><br><br><br><br><br><br><br><br><br>