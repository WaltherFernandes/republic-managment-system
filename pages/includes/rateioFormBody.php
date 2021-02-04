  <!-- Formulario -->
  <section class="  bg-light" id="sobre">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
            <h2>Rateio</h2>
            <hr/>
            <form id="formRat" action="plugins/rateioSalvar" method="post" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value= "<?=$id?>">
                <div class="row form-group">
                    <div class="col-md-4">
                    <label for="responsavel">Morador</label>  
                    <select class="form-control" name="responsavel" id="responsavel">
                        <?php
                            echo "<option value='' selected disabled>Selecione um morador</option>";
                            foreach ($moradores as $morador) {
                                echo "<option value='{$morador->idMorador}'>{$morador->nome}</option>";
                            }
                            
                        ?>
                    </select>
                    </div>
                    <div class="col-md-3">
                        <label for="valorRateio">Valor</label>  
                        <input class="form-control" id="valorRateio" name="valorRateio" value="" type="text" placeholder="Informe o valor">
                    </div>
                    <div class="col-md-4">
                        <label for="desc">Situação</label>  
                        <select class="form-control" name="situacao" id="situacao">
                        <?php
                                echo "<option value='' selected disabled>Selecione uma situação</option>";
                                echo "<option value='0'>Pago</option>";
                                echo "<option value='1'>Nao pago</option>";
                        ?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-success btn-lg my-4">+</button>	
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </section>
  

  


