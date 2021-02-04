$(document).ready(function(){
    $('.money').mask('#.##0,00', {reverse: true});
});

$("#formAltSenha").validate(
    {
        rules:{
            senhaAtual:{
                required:true			   
            },
            novaSenha1:{
            required:true,
            rangelength:[4,10]
            },
            novaSenha2:{
            required:true,
            equalTo:"#novaSenha1"
            }		
        }, 
        messages:{
            senhaAtual:{
                required:"Campo obrigatório"
            },
            novaSenha1:{
                required:"Campo obrigatório",
                rangelength: "A senha deve conter entre 4 e 10 caracteres"
            },
            novaSenha2:{
                required:"Campo obrigatório",
                equalTo: "As senhas não coincidem"
            }		
        }
    }
);