<!-- Cabeçalho -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-1">Bem vindo, <?=$nome?></h1>
      <h3 class="mb-5">
        <em>DEV REPUBLICA - O site que te ajuda a gerenciar sua republica</em>
      </h3>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#contas">PAINEL DE INFORMAÇÕES</a>
    </div>
    <div class="overlay"></div>
  </header>

  <!-- Sobre -->
  <section class="content-section bg-light" id="sobre">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2>O próximo passo para o gerenciamento de republicas!</h2>
          <p class="lead mb-5">Essa ideia surgiu a partir do trabalho proposto pelo Ms. Odilon Côrrea. Estamos em constante evolução! <br><br><br>
          <a class="btn btn-dark btn-xl js-scroll-trigger" href="#servicos">NOSSOS SERVIÇOS</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Serviços -->
  <section class="content-section bg-primary text-white text-center" id="servicos">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0">Serviços</h3>
        <h2 class="mb-5">Quais os nosso serviços</h2>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 mb-lg-0">
            <a href="moradorTabela" class="stretched-link" style="text-decoration: none;">
                <span class="service-icon rounded-circle mx-auto mb-3">
                    <i class="icon-screen-smartphone"></i>
                </span>
                <h4>
                    <strong style="color: white;">Moradores</strong>
                </h4>
                <p class="text-faded mb-0">Cadastre, delete/suspenda, edite e veja os moradores da republica.</p>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 mb-5 mb-lg-0">
            <a href="contaTabela" style="text-decoration: none;">
                <span class="service-icon rounded-circle mx-auto mb-3">
                    <i class="icon-pencil"></i>
                </span>
                <h4>
                    <strong style="color: white;">Contas</strong>
                </h4>
                <p class="text-faded mb-0">Cadastre, delete/suspenda, edite e veja as contas da republica.</p>
            </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Graficos e tabela -->
    
    <section class="callout"  onload="onload='exibirGraficoTipo()'">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 float-right">
                    <form id="formulario" action="" method="post" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-md-6" id='contas'>
                                <label for="inicio">Início</label>  
                                <input class="form-control" id="inicio" name="inicio" value="<?php echo $inicio?>" type="date" type="text" placeholder="Informe a data de nascimento">
                            </div>
                            <div class="col-md-6">
                                <label for="termino">Término</label>  
                                <input class="form-control" id="termino" name="termino" value="<?php echo $termino?>" type="date" type="text" placeholder="Informe a data de nascimento">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button onclick='exibirGraficoTipo()' type='button' class="btn btn-success float-right">Atualizar</button>	
                            </div>											
                        </div>					
                    </form>	
                </div>
            </div>
        </div>
        <div id="graficos" class="row mt-5">
            <div class="col-md-6">
                <div id="grafTipoDiv" class="mt-4">		
                    <div class="areaGrafTipo">
                        <canvas id="grafTipo"></canvas>	 
                    </div>	
                </div>
            </div>
            <div class="col-md-6">
                <div id="grafMoradorDiv" class="mt-4">		
                    <div class="areaGrafMorador">
                        <canvas id="grafMorador"></canvas>	 
                    </div>	
                </div>	
            </div>
        </div>
        <div class="container text-center mt-5">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Responsável</th>
                        <th>Vencimento</th>
                        <th>Estado</th>
                        <th>Valor da conta</th>
                    </tr>
                </thead>
                <tbody id='tabelaContas'>
                    
                </tbody>
            </table>
        </div>
    </section>