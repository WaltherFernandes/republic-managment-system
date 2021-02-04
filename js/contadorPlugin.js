var contador = document.querySelector('p#contadorSessao');
var minutos = 05;
var segundos = 00;
var tempo = (minutos * 60) + segundos;

function atualizarContador() {

    if (tempo > 0) {
        minutos = parseInt(tempo/60);
        segundos = tempo % 60;

        if(segundos < 10){
            segundos = "0" + segundos;
        }
        if(minutos < 10){
            minutos = "0" + minutos;
        }

        printHour = minutos + ":" + segundos;


        contador.innerHTML = printHour;
        tempo--;

        setTimeout('atualizarContador()', 1000);
    } else {
        alert('Sessão expirada. Por favor, relogue!');
        document.location.href = '../pages/plugins/logout'
    }

}

atualizarContador();