<?php

    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    $select = '<label for="idTipo">Morador</label>
                <select name="idMorador" id="idMorador" class="form-control">
                    <option selected disabled>Selecione um morador</option>';

    $moradores = rep::getMoradores();

    foreach ($moradores as $morador){
        $select .= '<option value="'.$morador->idMorador.'">'.$morador->nome.'</option>';
    }

    $select .= '</select>';

    echo $select;

?>