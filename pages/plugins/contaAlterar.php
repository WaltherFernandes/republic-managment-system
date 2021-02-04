<?php
    session_start();

    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    /**
     * Recupera os dados do formulário e coloca no objeto
     */
    if(isset($_POST['desc']) && isset($_POST['valor'])){
        $id = $_POST['id'];
        $obRep = new rep;
        $obRep->descricao = $_POST['desc'];
        $obRep->idMorador = $_POST['responsavel'];
        $obRep->idTipo = $_POST['tconta'];
        $obRep->dataVencimento = $_POST['data'];
        $obRep->valor = arrumarValor($_POST['valor']);
        $obRep->estado = $_POST['estado'];
        $obRep->observacao = $_POST['observacao'];

        $obRepAntigo = rep::getConta($id);
        $estadoAntigo = $obRepAntigo->estado;
        $obRep->atualizarConta($id);
        salvarHistorico($obRep->estado, $id, $estadoAntigo);

        header('location: ../contaTabela');
        exit;
    }

    function arrumarValor($valor){
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return $valor;
    }

    /**
     * Salva o histórico
     */
    function salvarHistorico($estadoNovo, $conta, $estadoAntigo){
        $estado = ""; 
        if($estadoAntigo == 0 && $estadoNovo == 1){
            $estado = 1;
        }else{
            $estado = 2;
        }
        $obRep = new rep;
        date_default_timezone_set('America/Sao_Paulo');
        $obRep->data = date('Y-m-d H:i:s');
        $obRep->estado = $estado;
        $obRep->idMorador = $_SESSION['user'];
        $obRep->idConta = $conta;

        $obRep->cadastrarHistórico();
    }

?>