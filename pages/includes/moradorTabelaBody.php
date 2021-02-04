<div class="modal fade" id="moradorModal">
    <div class="modal-dialog modal-xl" id="corpoModal">
      

    </div>
  </div>


  <!-- Formulario -->
  <section class="content-section bg-light" id="sobre">
    <div class="container container-fluid">
        <div class="table-responsive container">
            <div class="table-wrapper">
              <div class="row">
                <?=$forms?>
                <div class="col-md-6">
                  <h2>Moradores da republica</h2>
                </div>
                <div class="col-md-6">
                  <a class="btn btn-primary float-right" href="moradorForm">Novo cadastro</a>
                </div>
              </div><br>
                <table class="table table-striped table-hover table-bordered" id="tabela">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>Morador <i class="fa fa-sort"></i></th>
                            <th>E-mail </th>
                            <th>Telefone <i class="fa fa-sort"></i></th>
                            <th>Ações </th>
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
  <br><br><br><br><br><br><br><br><br><br><br><br><br>  