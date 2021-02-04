<?php

    require '../../vendor/autoload.php';
    use \App\Entity\rep;
    
    $inicio = $_POST['dataInicial'];
    $termino = $_POST['dataFinal'];

    $objContas = rep::getContasIndex($inicio, $termino);

    $resultados = '';
    $total = 0;
    foreach($objContas as $conta){
        if($conta->estado == 0){
            $estado = "Aberta";
        }else{
            $estado = "Fechada";
        }
        $data = date('d/m/Y', strtotime($conta->dataVencimento));
        $resultados .= "<tr style='background-color: white;'>
                            <td class='align-middle'>$conta->descricao</td>
                            <td class='align-middle'>$conta->nomeTipo</td>
                            <td class='align-middle'>$conta->nomeMorador</td>
                            <td class='align-middle'>$data</td>
                            <td class='align-middle'>$estado</td>
                            <td class='align-middle money'>".$conta->valor."</td>
                        </tr>";
        $total += $conta->valor*100;
    }
    $resultados .= "<tr style='background-color: white;'><td style='background-color: white;' colspan='5'><b class='float-right'>Total: </b></td><td class='money'>$total</td></tr>";

    if(sizeof($objContas)==0){
        $resultados = "<td colspan='6' class='text-center'>Nenhuma conta cadastrado</td>";
    }

    echo $resultados;

?>