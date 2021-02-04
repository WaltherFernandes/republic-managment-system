  <!-- Formulario -->
  <?=$forms?>
  <section class="content-section bg-light" id="sobre">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
            <h2>Formulário de cadastro</h2>
            <hr/>
            <form id="formulario" action="plugins/<?=$action?>" method="post" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value= "<?=$id?>">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="desc">Descrição</label>  
                        <input class="form-control" id="desc" name="desc" value="<?=$descricao?>" type="text" placeholder="Informe o nome">
                    </div>
                    <div class="col-md-4">	
                        <label for="responsavel">Morador Responsável</label>  
                        <select class="form-control" name="responsavel" id="responsavel">
                            <?php
                                if($idMorador == 0){
                                    echo "<option value='' selected disabled>Selecione um morador</option>";
                                    foreach ($moradores as $morador) {
                                        echo "<option value='{$morador->idMorador}'>{$morador->nome}</option>";
                                    }
                                }else{
                                    foreach($moradores as $morador){	
                                        if($morador->idMorador != $conta->idMoradorResponsavel){
                                            echo "<option value='{$morador->idMorador}'>{$morador->nome}</option>";
                                        }else{
                                            echo "<option selected value='{$morador->idMorador}'>{$morador->nome}</option>";
                                        }											
                                    }												
                                }
                            ?>
                        </select>
                    </div>	
                    <div class="col-md-4">
                        <label for="responsavel">Tipo de conta</label>  
                        <select class="form-control" name="tconta" id="tconta">
                            <?php	
                                if($idTipoConta == 0){
                                    echo "<option value='' selected disabled>Selecione um tipo de de conta</option>";
                                    foreach($tipos as $tipo){												
                                        echo "<option value='{$tipo->idTipo}'>{$tipo->nome}</option>";
                                    }											
                                }else{
                                    foreach($tipos as $tipo){	
                                        if($tipo->idTipo != $idTipoConta){
                                            echo "<option value='{$tipo->idTipo}'>{$tipo->nome}</option>";
                                        }else{
                                            echo "<option selected value='{$tipo->idTipo}'>{$tipo->nome}</option>";
                                        }											
                                    }												
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                <div class="col-md-4">
                    <label for="data">Data de Vencimento</label>  
                    <input class="form-control" id="data" name="data" value="<?php echo $data?>" type="date">
                </div>
                <div class="col-md-4">
                    <label for="valor">Valor</label>  
                    <input class="form-control" id="valor" name="valor" value="<?php echo $valor?>" type="text" placeholder="Informe o valor da conta">
                </div>
                <div class="col-md-4">
                    <label for="estado">Estado</label>  
                    <select class="form-control" name="estado" id="estado">	
                        <?php
                            if($id == 0){
                                echo "<option value='' selected disabled>Selecione um estado</option>";
                                echo "<option value='0'>Aberta</option>
                                      <option value='1'>Fechada</option>";											
                            }else{
                                if($estado == 0){
                                    echo "<option value='0' selected>Aberta</option>
                                          <option value='1'>Fechada</option>";		
                                }else{
                                    echo "<option value='0'>Aberta</option>
                                          <option value='1' selected>Fechada</option>";		
                                }												
                            }
                        ?>
                    </select>								
                </div>			
                </div>	
                <div class="form-group">
                <label for="observacao">Observação</label>
                <textarea placeholder="Caso haja alguma observação, digite aqui" class="form-control" id="observacao" name="observacao" rows="3" style="resize: none;"><?php echo $observacao ?></textarea>
                </div>
                <hr/>
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

  


