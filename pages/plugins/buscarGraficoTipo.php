<?php
    require '../../vendor/autoload.php';

    use \App\Entity\rep;

	$dataInicial = $_POST['dataInicial'];
	$dataFinal = $_POST['dataFinal'];

    $registros = rep::getTipoByMoney($dataInicial, $dataFinal);

	$tipos = array();
	$valores = array();
	
	foreach($registros as $registro){
		array_push($tipos, $registro['nome']);
		array_push($valores, $registro['total']);
	}

	$dados = array('tipos' => $tipos, 'valores' => $valores);		  
	echo json_encode($dados);	
?>