$(document).ready(function(){
    $(document).on('click','.view_data', function(){
        var idMor = $(this).attr("id");
        if(idMor !== ''){
            var dados = {
                idMor: idMor
            };
            $.post('../pages/template/moradorTabelaTemplate.php', dados, function(oHTML){
                $("#corpoModal").html(oHTML);
                $('#moradorModal').modal('show'); 
            });
        }
    });
});

$('#modalHist').on('show.bs.modal', function (event) {
	//Recupera o botão que acionou o modal
	var button = $(event.relatedTarget) 

	//Extrai informação dos atributos data-* do botão
	var codigo = button.data('codigo')
	var nome = button.data('nome') 

	//Recupera a estrutura do modal
	var modal = $(this)
	
	//Atualiza do título do modal
	modal.find('.modal-title').text('Histórico da conta: ' + nome )

	//realiza uma requisição AJAX 
	$.ajax({
		url  : '../pages/plugins/getHistoricoConta.php',
		type : 'post',
		data : {
			 idConta : codigo
		}
   })
   .done(function(resultado){
		//Atualização das linhas do corpo da tabela
		modal.find('#tabelaModal tbody').html(resultado)
   });   
})

$('#modalExtrato').on('show.bs.modal', function (event) {

	//Recupera a estrutura do modal
	var modal = $(this)

	//realiza uma requisição AJAX 
	$.ajax({
		url  : '../pages/plugins/getTipos.php',
		type : 'post'
   })
   .done(function(resultado){
		//Atualização das linhas do corpo da tabela
		modal.find('.autoJS').html(resultado)
   });   
})

$('#modalConta').on('show.bs.modal', function (event) {

	//Recupera a estrutura do modal
	var modal = $(this)

	//realiza uma requisição AJAX 
	$.ajax({
		url  : '../pages/plugins/getContas.php',
		type : 'post'
   })
   .done(function(resultado){
		//Atualização das linhas do corpo da tabela
		modal.find('.autoJS').html(resultado)
   });   
})
