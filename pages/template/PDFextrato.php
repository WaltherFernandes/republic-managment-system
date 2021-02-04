<?php

    use Mpdf\Mpdf;

    require_once('../../vendor/autoload.php');

    $mpdf = new Mpdf();
    $mpdf->setDisplayMode("fullpage");
    $css = file_get_contents('../../css/pdfextrato.css');
    $mpdf->WriteHTML($css, 1);

    if(!isset($_POST['idTipo'])){
        echo "<script>alert('Dados necessários não fornecidos!'); location.href='../'</script>";
        exit;
    }

    require_once('../../vendor/autoload.php');

    use App\Entity\rep;

    if($_POST['idTipo'] == 0){
        $contas = rep::getContas("dataVencimento BETWEEN ('".$_POST['dataInicial']."') AND ('" . $_POST['dataFinal']. "');");
        $rateios = rep::getRateios();
        $tipoString = 'Todos';
    }else{
        $idTipo = $_POST['idTipo'];
        $contas = rep::getContas('idTipo = ' . $idTipo . " AND dataVencimento BETWEEN ('".$_POST['dataInicial']."') AND ('" . $_POST['dataFinal']. "');");
        $rateios = rep::getRateios();
        $tipoVet = rep::getTipo($_POST['idTipo']);
        $tipoString = $tipoVet->nome;
    }

    if(sizeof($contas)==0){
        echo "<h2 style='color: red;'>Nenhum registro com esse filtro</h2>";
        exit;
    }
    
    $idTipo = $_POST['idTipo'];

    $tabelaExtrato = '';
    $total = 0;

    if(sizeof($contas)>0){
        foreach ($contas as $conta) {
            $tipo = rep::getTipo($conta->idTipo);
            $tabelaExtrato .= '<tr>
                                    <td>'.$conta->descricao.'</td>
                                    <td>'.$tipo->nome.'</td>
                                    <td>'.date("d/m/Y", strtotime($conta->dataVencimento)).'</td>
                                    <td>'.$conta->valor.'</td>
                                </tr>';
            $total += $conta->valor;
        }
        $tabelaExtrato .= '<tr><td colspan="4">Total: '.$total.'</td></tr>';
    }else{
        $tabelaExtrato = "<td colspan='4'>Nenhum dado encontrado</td>";
    }

    $tabelaMoradores = '';
    $valorTotal = 0.0;
    $moradores = rep::getMoradores();
    foreach($moradores as $morador){
        $valorPago = 0.0;
        $valorDebito = 0.0;
        if($idTipo==0){
            $rateiosPorMorador = rep::getRateios('idMorador = ' . $morador->idMorador);
            foreach($rateiosPorMorador as $rateio){
                if($rateio->situacao == 0){
                    $valorPago += $rateio->valor;
                }else{
                    $valorDebito += $rateio->valor;
                }
            }
        }else{
            $rateiosPorMoradorAux = rep::getRateios('idMorador = ' . $morador->idMorador);
            foreach ($rateiosPorMoradorAux as $rateio) {
                $conta = rep::getConta($rateio->idConta);
                if($conta->idTipo == $idTipo){
                    if($rateio->situacao == 0){
                        $valorPago += $rateio->valor;
                    }else{
                        $valorDebito += $rateio->valor;
                    }
                }
            }
        }
        $tabelaMoradores .= '<tr>
                                <td>'.$morador->nome.'</th>
                                <td>'.$morador->CPF.'</td>
                                <td>'.$valorPago.'</td>
                                <td>'.$valorDebito.'</td>
                            </tr>';
    }
    if(sizeof($contas)<=0){
        $tabelaMoradores = "<td colspan='4' class='text-center'>Nenhum dado encontrado</td>";
    }

    $html = '
            <div class="total">
            <div class="header">
                <h1>Extrato DevRepublicas</h1>
            </div>
            <hr>
            <div class="top">
                <p><strong>Tipo: </strong>'.$tipoString.' / <strong>Período: </strong>'. date('d/m/Y', strtotime($_POST['dataInicial'])).' - '.date('d/m/Y', strtotime($_POST['dataFinal'])) .'</p>
            </div>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Vencimento</th>
                        <th>Valor do rateio</th>
                    </tr>
                </thead>
                <tbody>
                    '.$tabelaExtrato.'
                </tbody>
            </table>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>Morador</th>
                        <th>CPF</th>
                        <th>Valor pago</th>
                        <th>Valor em débito</th>
                    </tr>
                </thead>
                <tbody>
                    '.$tabelaMoradores.'
                </tbody>
            </table>
        </div>
    ';

    $mpdf->WriteHTML($html, 2);
    $mpdf->Output('relatorioFichaTreino.pdf',I);

?>