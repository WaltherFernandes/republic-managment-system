<?php

    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    $idMor = $_POST['idMor'];

    $morador = rep::getMorador($idMor);

    $resultado = '';
    
    $resultado .= '<div class="container">
    
                        
                        <div class="row">
                            <div class="col-md-8 modal-header" style="margin: auto; background-color: #ffb922;">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8" style="margin: auto; background-color:#ffb922;"  >
                                <img src="../img/users/'.$morador->foto.'" class="img-thumbnail mx-auto d-block" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 rounded-bottom" style="margin: auto; background-color: #ffc107;" >
                                <table class="table table-bordered table-dark">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">Nome</th>
                                            <td class="text-center">'.$morador->nome.'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Data de nascimento</th>
                                            <td class="text-center">'.date('d/m/Y', strtotime($morador->dataNascimento)).'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" type class="text-center">CPF</th>
                                            <td class="text-center">'.$morador->CPF.'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" type class="text-center">Celular</th>
                                            <td class="text-center">'.$morador->celular.'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" type class="text-center">E-mail</th>
                                            <td class="text-center">'.$morador->email.'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2" type class="text-center">Anotações gerais abaixo</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2" type class="text-center">
                                                <textarea style="color: white; resize: none; background-color: #32383d; border: none;" class="form-control text-center" id="contatos" name="contatos" rows="3" value="">'.$morador->contato.'</textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';

    if(isset($_POST['idMor'])){
        echo $resultado;
    }
    

    

?>  