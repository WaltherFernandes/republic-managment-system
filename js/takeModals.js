$(document).ready(function(){
    $(document).on('click','.view_data', function(){
        var idMor = $(this).attr("id");
        //alert(idMor);
        //Verificar se há valor na variável "user_id".
        if(idMor !== ''){
            var dados = {
                idMor: idMor
            };
            $.post('../paginas/moradorModalTemplate.php', dados, function(oHTML){
                //Carregar o conteúdo para o usuário
                $("#corpoModal").html(oHTML);
                $('#moradorModal').modal('show'); 
            });
        }
    });
});