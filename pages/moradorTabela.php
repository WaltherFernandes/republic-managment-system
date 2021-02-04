<?php
    session_start();

    require '../vendor/autoload.php';
    require './plugins/checkLogin.php';

    use \App\Entity\rep;

    $moradores = rep::getMoradores();
    $idMorador = 0;

    $resultados = '';
    $forms = '';
    foreach($moradores as $morador){
        $forms .="<form action='moradorForm' method='post' name='getId".$morador->idMorador."' id='getId".$morador->idMorador."'>
                    <input type='hidden' id='id' value=".$morador->idMorador." name='id'>
                </form>
                <form action='moradorExcluir' method='post' name='getExId".$morador->idMorador."' id='getExId".$morador->idMorador."'>
                    <input type='hidden' idEx='id' value=".$morador->idMorador." name='idEx'>
                </form>";
        $resultados .= "<tr>
                            <td>".$morador->idMorador."</td>
                            <td><img  width='50' height='50' class='rounded-circle' style='object-fit: cover; margin-right: 8px;' src='../img/users/".$morador->foto."'/>".$morador->nome."</td>
                            <td class='align-middle'>".$morador->email."</td>
                            <td class='align-middle'>".$morador->celular."</td>
                            <td class='align-middle'>
                                <button type='button' class='view_data' data-toggle='modal' data-target='' id='".$morador->idMorador."' name='idMorador' style='color: #155d74; padding: 0; border: none; background: none;''>
                                    <i class='material-icons'>&#xE417;</i>
                                </button>
                                <a href='javascript:getId".$morador->idMorador.".submit()' class='edit' title='Edit' data-toggle='tooltip'><i style='color: #ba9106;' class='material-icons'>&#xE254;</i></a>
                                <a href='javascript:getExId".$morador->idMorador.".submit()' class='delete' title='Delete' data-toggle='tooltip'><i style='color:  rgb(141, 12, 12)' class='material-icons'>&#xE872;</i></a>
                            </td>
                        </tr>";
    }

    if(sizeof($moradores)==0){
        $resultados = "<td colspan='5' class='text-center'>Nenhum morador cadastrado</td>";
    }

    include('./includes/header.php');
    include('./includes/moradorTabelaBody.php');
    include('./includes/footer.php');

?>