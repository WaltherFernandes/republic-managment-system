<div class="modal fade" id="contaModal">
    <div class="modal-dialog modal-xl" id="corpoModal">
        

    </div>
</div>

<div class="modal fade" id="modalHist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Change</h2>
            </div>
            <div class="modal-body">
                <table class="table" id="tabelaModal" name="tabelaModal">
                    <thead class="thead-dark">
                        <tr>
                            <th>Ação</th> <th>Data</th>	<th>Morador modificador</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalExtrato" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Gerar extrato</h2>
            </div>
            <div class="modal-body">
                <form id="form1" action="./template/PDFextrato" method="post">
                    <div class="row">
                        <div class="col-md-12 autoJS">
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="dataInicial">Data inicial</label>  
                            <input class="form-control" id="dataInicial" name="dataInicial" type="date">
                        </div>
                        <div class="col-md-6">
                            <label for="dataFinal">Data final</label>  
                            <input class="form-control" id="dataFinal" name="dataFinal" type="date">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success float-right mx-1">Procurar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalConta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Detalhar conta do morador</h2>
            </div>
            <div class="modal-body">
                <form id="form2" action="./template/PDFconta   " method="post">
                    <div class="row">
                        <div class="col-md-12 autoJS">
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success float-right mx-1">Procurar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

  <!-- Formulario -->
<section class="content-section bg-light" id="sobre">
<div class="container container-fluid">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="row">
            <?=$forms?>
            <div class="col-md-6">
                <h2>Contas da republica</h2>
            </div>
            <div class="col-md-6">
                <a class="btn btn-primary float-right ml-1" href="contaForm">Novo cadastro</a>
                <a class="btn btn-primary float-right" data-target='#modalExtrato' data-toggle='modal' href="">Extrato</a>
                <a class="btn btn-primary float-right mt-1" data-target='#modalConta' data-toggle='modal' href="">Detalhar morador</a>
            </div>
            </div><br>
            <table class="table table-striped table-hover table-bordered" id="tabela">
                <thead>
                    <tr>
                        <th># </th>
                        <th>Descrição <i class="fa fa-sort"></i></th>
                        <th>Valor </th>
                        <th>Morador responsável <i class="fa fa-sort"></i></th>
                        <th>Estado </th>
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
<br><br><br><br><br><br><br><br><br><br><br><br>