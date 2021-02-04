window.onload = teste();

function teste(){
    document.querySelector('form#formulario').action = './contaExcluir';
    document.querySelector('h1#title').innerText = 'Exlusão de mestre-detalhe';
}