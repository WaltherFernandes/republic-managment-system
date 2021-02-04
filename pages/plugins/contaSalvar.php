<?php

    require '../../vendor/autoload.php';

    use \App\Entity\rep;
    
    /**
     * Recupera os dados do formulário e coloca no objeto
     */
    if(isset($_POST['desc']) && isset($_POST['valor'])){
        $obRep = new rep;
        session_start();
        $obRep->descricao = $_POST['desc'];
        $obRep->idMoradorResponsavel = $_POST['responsavel'];
        $obRep->idTipo = $_POST['tconta'];
        $obRep->dataVencimento = $_POST['data'];
        $obRep->valor = arrumarValor($_POST['valor']);
        $obRep->estado = $_POST['estado'];
        $obRep->observacao = $_POST['observacao'];

        $obRep->cadastrarConta();
        $obCadastrado = rep::getLastId();
        salvarHistorico($obRep->estado, $obCadastrado->idConta);

        header('location: ../contaTabela');
        exit;
    }

    /**
     * Arruma o valor antes da salvar
     */
    function arrumarValor($valor){
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return $valor;
    }

    /**
     * Salva o histórico
     */
    function salvarHistorico($estadoNovo, $conta){
        $estado = "";
        if($estadoNovo == 0){
            $estado = 0;
        }else{
            $estado = 1;
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