$(document).ready(function(){
    exibirGraficoTipo();
});

function get_cor_aleatoria(){
    var posarray;
    var hexadecimal = new Array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F")
    var cor_aleatoria = "#";
    for (i=0;i<6;i++){
       posarray = Math.floor(Math.random() * (hexadecimal.length - 0));
       cor_aleatoria += hexadecimal[posarray]
    }
    return cor_aleatoria;
}

coresMoradores = [];
coresTipos = [];

for (let index = 0; index < 12; index++) {
    coresMoradores.push(get_cor_aleatoria());
    coresTipos.push(get_cor_aleatoria());
}

function exibirGraficoTipo() {
    var dataInicialFiltro = $("#inicio").val();
    var dataFinalFiltro = $("#termino").val();

    $.ajax({
        url: './plugins/buscarGraficoTipo.php',
        type: 'post',
        data: {
            dataInicial: dataInicialFiltro,
            dataFinal: dataFinalFiltro
        },
        success: function(retorno) {
            dados = JSON.parse(retorno);
            var type = 'bar';
            var data = {
                labels: dados.tipos,
                datasets: [{
                    fillColor: false,
                    backgroundColor: coresTipos,
                    data: dados.valores
                }]
            };
            var options = {
                responsive: true,
                title: {
                    display: true,
                    text: 'Gastos por tipo'
                },
                legend: {
                    display: false,

                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            var ctx = document.querySelector('canvas#grafTipo').getContext("2d");
            new Chart(ctx, { type, data, options });
        }
    });
    exibirGraficoMorador();
    return false;
}

function exibirGraficoMorador() {
    var dataInicialFiltro = $("#inicio").val();
    var dataFinalFiltro = $("#termino").val();

    $.ajax({
        url: './plugins/buscarGraficoMorador.php',
        type: 'post',
        data: {
            dataInicial: dataInicialFiltro,
            dataFinal: dataFinalFiltro
        },
        success: function(retorno) {
            dados = JSON.parse(retorno);
            var type = 'bar';
            var data = {
                labels: dados.nomes,
                datasets: [{
                    fillColor: false,
                    backgroundColor: coresMoradores,
                    data: dados.valores
                }]
            };
            var options = {
                responsive: true,
                title: {
                    display: true,
                    text: 'Gastos por morador'
                },
                legend: {
                    display: false,

                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            var ctx = document.querySelector('canvas#grafMorador').getContext("2d");
            new Chart(ctx, { type, data, options });
        }
    });
    gerarTabela();
    return false;
}

function gerarTabela(){
    var dataInicialFiltro = $("#inicio").val();
    var dataFinalFiltro = $("#termino").val();

    $.ajax({
        url: './plugins/gerarTabelaIndex.php',
        type: 'post',
        data: {
            dataInicial: dataInicialFiltro,
            dataFinal: dataFinalFiltro
        },
        success: function(retorno) {
            document.querySelector('tbody#tabelaContas').innerHTML = retorno;
            $('.money').mask('#.##0,00', {reverse: true});
        }
    });


    return false;
}