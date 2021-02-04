<?php
    session_start();

    require '../vendor/autoload.php';
    require './plugins/checkLogin.php';

    use \App\Entity\rep;

    $contas = rep::getContas();
    $idConta = 0;

    $resultados = '';
    $forms = '';
    foreach($contas as $conta){
        if($conta->estado == 0){
            $estado = "Aberta";
        }else{
            $estado = "Fechada";
        }
        $forms .="<form action='contaForm' method='post' name='getId".$conta->idConta."' id='getId".$conta->idConta."'>
                    <input type='hidden' id='id' value=".$conta->idConta." name='id'>
                </form>
                <form action='contaExcluir' method='post' name='getExId".$conta->idConta."' id='getExId".$conta->idConta."'>
                    <input type='hidden' idEx='id' value=".$conta->idConta." name='idEx'>
                </form>";
        $morador = rep::getMorador($conta->idMoradorResponsavel);
        $valor = str_replace(".", "", $conta->valor);
        $resultados .= "<tr>
                            <td>".$conta->idConta."</td>
                            <td class='align-middle'>$conta->descricao</td>
                            <td class='align-middle money' class='money'>".$valor."</td>
                            <td class='align-middle'>".$morador->nome."</td>
                            <td class='align-middle'>".$estado."</td>
                            <td class='align-middle'>
                                <button type='button' class='view_data_conta' data-toggle='modal' title='VISUALISAR' data-target='' id='".$conta->idConta."' name='idMorador' style='color: #155d74; padding: 0; border: none; background: none;''>
                                    <i class='material-icons'>&#xE417;</i>
                                </button>
                                <a href='javascript:getId".$conta->idConta.".submit()' class='edit' title='EDITAR' data-toggle='tooltip'><i style='color: #ba9106;' class='material-icons'>&#xE254;</i></a>
                                <a href='javascript:getExId".$conta->idConta.".submit()' class='delete' title='DELETAR' data-toggle='tooltip'><i style='color:  rgb(141, 12, 12)' class='material-icons'>&#xE872;</i></a>
                                <button data-toggle='modal' title='HISTÓRICO' data-target='#modalHist' data-nome='{$conta->descricao}' data-codigo='{$conta->idConta}'><i style='color: rgb(104, 112, 212)' class='material-icons'>article</i></button>
                                <button id='duplicar' title='DUPLICAR' name='idConta' value='{$conta->idConta}'><i style='color: rgb(0, 0, 0)' class='material-icons'>content_copy</i></button> 
                            </td>
                        </tr>";
    }

    if(sizeof($contas)==0){
        $resultados = "<td colspan='6' class='text-center'>Nenhuma conta cadastrado</td>";
    }

    include('./includes/header.php');
    include('./includes/contaTabelaBody.php');
    include('./includes/footer.php');

?>