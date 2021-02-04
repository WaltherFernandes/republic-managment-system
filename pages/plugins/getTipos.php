<?php

    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    $select = '<label for="idTipo">Tipo</label>
                <select name="idTipo" id="idTipo" class="form-control">
                    <option value="0" selected>Todos</option>';

    $tipos = rep::getTipos();

    foreach ($tipos as $tipo){
        $select .= '<option value="'.$tipo->idTipo.'">'.$tipo->nome.'</option>';
    }

    $select .= '</select>';

    echo $select;

?>