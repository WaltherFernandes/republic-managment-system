<?php
    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $situacao = $_POST['situ'];
        $valor = arrumarValor($_POST['valorRatAlt']);
        $idConta = $_POST['idConta'];
        $idMorador = $_POST['idMor'];
        if($situacao==0){
            $obRat = new rep;
            $obRat->situacao = 1;
            $obRat->valor = $valor;
            $obRat->idConta = $idConta;
            $obRat->idMorador = $idMorador;
            $obRat->atualizarRateio($id);
        }else{
            $obRat = new rep;
            $obRat->situacao = 0;
            $obRat->valor = $valor;
            $obRat->idConta = $idConta;
            $obRat->idMorador = $idMorador;
            $obRat->atualizarRateio($id);
        }
    }

    function arrumarValor($valor){
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        $valor = substr($valor, 0, -2);
        return $valor;
    }

?>

<form action="../contaForm" method="post" id="form" name="form">
    <input type='hidden' id='id' value="<?=$idConta?>" name='id'>
</form>

<script type="text/javascript">
   document.form.submit();
</script>