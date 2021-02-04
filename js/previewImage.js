function previewImagem(){
    var imagem = document.querySelector('input[name=imagem]').files[0];
    var preview = document.querySelector('#fotoPrin');
    
    var reader = new FileReader();
    
    reader.onloadend = function () {
        preview.src = reader.result;
        $("#imagem").val(reader.result);
    }

    if (Math.round(imagem.size / (1024 * 1024)) > 10) { // make it in MB so divide by 1024*1024
        alert('A imagem deve ser menor que 10mb.');
        return false;
    }

    if(imagem){
        reader.readAsDataURL(imagem);
    }else{
        preview.src = "";
    }

    var x = document.getElementById("fotoPrin").value;
}