<?php

    use Mpdf\Mpdf;

    require_once('../../vendor/autoload.php');

    $mpdf = new Mpdf();
    $mpdf->setDisplayMode("fullpage");
    $css = file_get_contents('../../css/pdfextrato.css');
    $mpdf->WriteHTML($css, 1);

    if(!isset($_POST['idMorador'])){
        echo "<script>alert('Dados necessários não fornecidos!'); location.href='../'</script>";
        exit;
    }

    use App\Entity\rep;

    $idMorador = $_POST['idMorador'];
    $rateios = rep::getRateiosForConta($idMorador);

    if(sizeof($rateios)==0){
        echo "<h2 style='color: red;'>Nenhum registro com esse filtro</h2>";
        exit;
    }

    $tabela = '';
    $total = 0;
    foreach ($rateios as $rateio){
        $tabela .= '<tr>
                                <td style="text-align: center;">'.$rateio->descricao.'</td>
                                <td style="text-align: center;">'.$rateio->nomeTipo.'</td>
                                <td style="text-align: center;">'.$rateio->valorConta.'</td>
                                <td style="text-align: center;">'.date("d/m/Y", strtotime($rateio->dataVencimento)).'</td>
                                <td style="text-align: center;">'.$rateio->valorRateio.'</td>
                            </tr>';
        $total += $rateio->valorRateio;
    }
    $total = number_format($total, 2);
    $tabela .= '<tr><td style="text-align: right;" colspan="5"><b>Total:</b> R$'.$total.'</td></tr>';

    $morador = rep::getMorador($idMorador);
    $html = '
            <div class="total">
            <div class="header">
                <h1>Conta DevRepublicas</h1>
            </div>
            <hr>
            <div class="top">
                <p><strong>Morador: </strong>'.$morador->nome.' / <strong>CPF: </strong>'. $morador->CPF .'</p>
            </div>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Valor da conta</th>
                        <th>Vencimento</th>
                        <th>Valor do rateio</th>
                    </tr>
                </thead>
                <tbody>
                    '.$tabela.'
                </tbody>
            </table>
        </div>
    ';

    $mpdf->WriteHTML($html, 2);
    $mpdf->Output('relatorioFichaTreino.pdf','I');

?>