$(document).ready(function(){
    $(document).on('click','.view_data_conta', function(){
        var idConta = $(this).attr("id");
        //alert(idMor);
        //Verificar se há valor na variável "user_id".
        if(idConta !== ''){
            var dados = {
                idConta: idConta
            };
            $.post('../pages/template/contaTabelaTemplate.php', dados, function(oHTML){
                //Carregar o conteúdo para o usuário
                $("#corpoModal").html(oHTML);
                $('#contaModal').modal('show'); 
            });
        }
    });
});