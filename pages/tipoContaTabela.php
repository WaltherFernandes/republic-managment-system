<?php
    session_start();
    require '../vendor/autoload.php';
    require './plugins/checkLogin.php';

    use \App\Entity\rep;

    $tipos = rep::getTipos();
    $idTipo = 0;

    $forms = '';
    $resultados = '';
    foreach($tipos as $tipo){
        $forms .="<form action='tipoContaForm' method='post' name='getId".$tipo->idTipo."' id='getId".$tipo->idTipo."'>
                    <input type='hidden' id='id' value=".$tipo->idTipo." name='id'>
                </form>
                <form action='tipoContaExcluir' method='post' name='getExId".$tipo->idTipo."' id='getExId".$tipo->idTipo."'>
                    <input type='hidden' idEx='id' value=".$tipo->idTipo." name='idEx'>
                </form>";
        $resultados .= "<tr>
                            <td>".$tipo->idTipo."</td>
                            <td>".$tipo->nome."</td>
                            <td>
                                <a href='javascript:getId".$tipo->idTipo.".submit()' class='edit' title='Edit' data-toggle='tooltip'><i style='color: #ba9106;' class='material-icons'>&#xE254;</i></a>
                                <a href='javascript:getExId".$tipo->idTipo.".submit()' class='delete' title='Delete' data-toggle='tooltip'><i style='color:  rgb(141, 12, 12)' class='material-icons'>&#xE872;</i></a>
                            </td>
                        </tr>";
    }

    if(sizeof($tipos)==0){
        $resultados = "<td colspan='3' class='text-center'>Nenhum tipo de conta cadastrado</td>";
    }

    include_once('./includes/header.php');
    include_once('./includes/tipoContaTabelaBody.php');
    include_once('./includes/footer.php');

?>