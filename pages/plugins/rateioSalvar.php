<?php

  require '../../vendor/autoload.php';

  use \App\Entity\rep;

  if(isset($_POST['valorRateio']) && isset($_POST['responsavel'])){
    $obRep = new rep;
    $obRep->idMorador = $_POST['responsavel'];
    $obRep->idConta = $_POST['id'];
    $obRep->valor = arrumarValor($_POST['valorRateio']);
    $obRep->situacao = $_POST['situacao'];

    $obRep->cadastrarRateio();
  }

  function arrumarValor($valor){
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", ".", $valor);
    return $valor;
  }

?>


<form action="../contaForm" method="post" id="form" name="form">
    <input type='hidden' id='idConta' value="<?=$_POST['id']?>" name='id'>
</form>

<script type="text/javascript">
   document.form.submit();
</script>