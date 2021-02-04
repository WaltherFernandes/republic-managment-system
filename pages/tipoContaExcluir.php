<?php

    require '../vendor/autoload.php';
    use \App\Entity\rep;

    //Validação da ID
    if(!isset($_POST['idEx']) or !is_numeric($_POST['idEx'])){
        header('location: ./tipoContaTabela');
        exit;
    }

    $obTipo = rep::getTipo($_POST['idEx']);
    
    if(!$obTipo instanceof rep){
        header('location: ./tipoContaTabela');
        exit;
    } 

    

    $registros = '';
    $idTipo = $_POST['idEx'];

    $contas = rep::getContas();
    $rateios = rep::getRateios();

    foreach($contas as $conta){
        if($conta->idTipo == $idTipo){
            $registros .= $conta->descricao."-";
        }
    }
    $vetor_reg = explode("-",$registros);
    array_pop($vetor_reg);

    $strContas = '';
    $strRateios = '';
    $cont = 0;
    foreach ($vetor_reg as $aux) {
        $cont++;
        $strContas .= "\\n" . $cont . ". " . $aux;
    }
    $obRep = rep::getTipo($idTipo);

    if($strContas != ''){
        echo "
            <script>
                if(confirm('Existem dados associados a esse tipo de conta. Deseja excluí-los?')){
                    location.href='./plugins/excluirTipoDetalhe?idTipo=$idTipo'
                }else{
                    location.href='./moradorTabela.php'
                }
            </script>
        ";
        exit;
    }

    include('./includes/header.php');
    include('./includes/tipoContaExluirBody.php');
    include('./includes/footer.php');

?>