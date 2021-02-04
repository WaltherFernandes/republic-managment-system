<?php

    require '../vendor/autoload.php';
    use \App\Entity\rep;

    //Validação da ID
    if(!isset($_POST['idEx']) or !is_numeric($_POST['idEx'])){
        header('location: ./moradorTabela');
        exit;
    }

    $obMorador = rep::getMorador($_POST['idEx']);
    
    if(!$obMorador instanceof rep){
        header('location: ./moradorTabela');
        exit;
    } 
    
    $idMorador = $_POST['idEx'];

    $obRat = rep::getRateios();

    $check = 0;

    foreach($obRat as $rateios){
        if($rateios->idMorador == $idMorador){
            $check = 1;
        }
    }

    $obRep = rep::getMorador($idMorador);

    if($check == 1){
        echo "<script>var r = alert('Nao foi possivel excluir a conta {$obRep->nome} pois tem rateios vinculados à ela')
              window.location='moradorTabela';</script>";
        exit;
    }


    $registros = '';
    

    $contas = rep::getContas();
    foreach($contas as $conta){
        if($conta->idMoradorResponsavel == $idMorador){
            $registros .= $conta->descricao."-";
        }
    }
    $vetor_reg = explode("-",$registros);
    array_pop($vetor_reg);

    $strMoradores = '';
    $cont = 0;
    foreach ($vetor_reg as $aux) {
        $cont++;
        $strMoradores .= "\\n" . $cont . ". " . $aux;
    }
      
    $obRep = rep::getMorador($idMorador);

    if($registros != ''){
        echo "
            <script>
                if(confirm('Existem dados associados a esse morador. Deseja excluí-los?')){
                    location.href='./plugins/excluirMoradorDetalhe?idMorador=$idMorador'
                }else{
                    location.href='./moradorTabela.php'
                }
            </script>
        ";
        exit;
    }

    include('./includes/header.php');
    include('./includes/moradorExcluirBody.php');
    include('./includes/footer.php');

?>