<?php
    session_start();

    require '../vendor/autoload.php';
    require './plugins/checkLogin.php';
    

    use \App\Entity\rep;


    $id = 0;
    $descricao = "";
    $idTipoConta = 0;
    $idMorador = 0;
    $data = "";
    $valor = "";
    $estado = "";
    $observacao = "";
    $dadosTabela = '';
    $action = 'contaSalvar';
    $forms = '';
    $obRateio = [];
    $moradores = rep::getMoradores();
    $tipos = rep::getTipos();

    if(isset($_POST['id'])){
        $obRateio = rep::getRateios("idConta = ". $_POST['id']);
        $id = $_POST['id'];
        $conta  = rep::getConta($_POST['id']);
        $descricao = $conta->descricao;
        $idTipoConta = $conta->idTipo;
        $idMorador = $conta->idMoradorResponsavel;
        $data = $conta->dataVencimento;
        $valor = str_replace(".", ",", $conta->valor);
        $estado = $conta->estado;
        $observacao = $conta->observacao;
        $action = "contaAlterar";
    }


    foreach($obRateio as $rateio){
        $morador = rep::getMorador($rateio->idMorador);
        if ($rateio->situacao == 0) {
            $situ = "Pago";
        }else{
            $situ = "Não pago";
        }
        
        $valor = str_replace(".", "", $rateio->valor);
        
        $forms .="<form action='plugins/rateioExcluir' method='post' name='getExId".$rateio->idRateio."' id='getExId".$rateio->idRateio."'>
                        <input type='hidden' id='id' value=".$rateio->idRateio." name='id'>
                        <input type='hidden' id='idConta' value=".$rateio->idConta." name='idConta'>
                    </form>
                    <form action='plugins/rateioAltSitu' method='post' name='getId".$rateio->idRateio."' id='getId".$rateio->idRateio."'>
                        <input type='hidden' id='id' value=".$rateio->idRateio." name='id'>
                        <input type='hidden' id='situ' value=".$rateio->situacao." name='situ'>
                        <input type='hidden' id='valorRatAlt' value=".$rateio->valor." name='valorRatAlt'>
                        <input type='hidden' id='idMor' value=".$rateio->idMorador." name='idMor'>
                        <input type='hidden' id='idConta' value=".$rateio->idConta." name='idConta'>
                    </form>";
        $dadosTabela .= "<tr>
                            <td class='align-middle'>".$rateio->idRateio."</td>
                            <td class='align-middle'>".$morador->nome."</td>
                            <td class='align-middle money'>".$valor."</td>
                            <td class='align-middle'>".$situ."</td>
                            <td>
                                <a href='javascript:getExId".$rateio->idRateio.".submit()' class='Delete align-middle' title='Deletar' data-toggle='tooltip'><i style='color:  rgb(141, 12, 12)' class='material-icons'>&#xE872;</i></a>
                                <a href='javascript:getId".$rateio->idRateio.".submit()' class='Update align-middle' title='Mudar situação' data-toggle='tooltip'><span class='material-icons'>wifi_protected_setup</span></a>
                            </td>
                        </tr>";
    }

    if(sizeof($obRateio)==0){
        $dadosTabela = "<tr><td colspan='5' class='text-center'>Nenhum rateio cadastrado</td></tr>";
    }

    include('./includes/header.php');
    include('./includes/contaFormBody.php');
    if(isset($_POST['id'])){
        include('./includes/rateioFormBody.php');
        include('./includes/rateioTabelaBody.php');
    }
    include('./includes/footer.php');

?>

<script>
    $(document).ready(function () {
        $('#money').mask('000.000.000.000.000,00', {reverse: true});
    });
</script>