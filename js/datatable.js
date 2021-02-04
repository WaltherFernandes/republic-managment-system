$(document).ready( function () {
    $('#tabela').DataTable();
} );

$('#tabela').dataTable( {
    "language": {
        "lengthMenu": "Mostrando _MENU_ registros por página",
        "zeroRecords": "Nada registrado aqui",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "Nada registrado aqui",
        "loadingRecords": "Carregando...",
        "processing":     "Processando...",
        "search":         "Pesquisar:",
        "zeroRecords":    "Não encontramos resultados",
        "infoFiltered": "(Filtrado de _MAX_ registros)",
        "paginate": {
            "first": "Primeiro",
            "last": "Último",
            "previous": "Anterior",
            "next": "Próximo"
        }
    }
} );
