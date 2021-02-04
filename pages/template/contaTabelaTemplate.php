<?php

    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    $idConta = $_POST['idConta'];

    $conta = rep::getConta($idConta);
    $morador = rep::getMorador($conta->idMoradorResponsavel);
    $tipo = rep::getTipo($conta->idTipo);

    $resultado = '';

    if($conta->estado == 0){
        $estado = "Aberta";
    }else{
        $estado = "Fechada";
    }
    
    $valor = str_replace(".", "", $conta->valor);
    
    $resultado .= '<div class="container">
                        <div class="row">
                            <div class="col-md-8 modal-header" style="margin: auto; background-color: #ffb922;">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 rounded-bottom" style="margin: auto; background-color: #ffc107;" >
                                <table class="table table-bordered table-dark">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">Descrição</th>
                                            <td class="text-center">'.$conta->descricao.'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Valor</th>
                                            <td class="text-center" id="money">'.$valor.'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Data de vencimento</th>
                                            <td class="text-center">'.date('d/m/Y', strtotime($conta->dataVencimento)).'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" type class="text-center">Estado</th>
                                            <td class="text-center">'.$estado.'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" type class="text-center">Tipo</th>
                                            <td class="text-center">'.$tipo->nome.'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" type class="text-center">Morador responsável</th>
                                            <td class="text-center">'.$morador->nome.'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2" type class="text-center">Observações abaixo</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2" type class="text-center">
                                                <textarea style="color: white; resize: none; background-color: #32383d; border: none;" class="form-control text-center" id="contatos" name="contatos" rows="3" value="">'.$conta->observacao.'</textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';

    if(isset($_POST['idConta'])){
        echo $resultado;
    }

?>

<script>
    $(document).ready(function () {
        $('#money').mask('000.000.000.000.000,00', {reverse: true});
    });
</script>