<?php
    require '../../vendor/autoload.php';

    use \App\Entity\rep;

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $idConta = $_POST['idConta'];
        $obRat = rep::getRateio($id);

        $obRat->excluirRateio($id);
    }
?>

<form action="../contaForm" method="post" id="form" name="form">
    <input type='hidden' id='id' value="<?=$idConta?>" name='id'>
</form>

<script type="text/javascript">
   document.form.submit();
</script>