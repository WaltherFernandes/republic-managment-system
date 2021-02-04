$(document).ready(function(){
    $('#valor').mask('000.000.000.000.000,00', {reverse: true});
    $('#valorRateio').mask('000.000.000.000.000,00', {reverse: true});
});
  
$("#formulario").validate(
    {
        rules:{
            desc:{
                required:true			   
            },
            responsavel:{
                    required:true
            },
            tconta:{
                required:true
            },
            data:{
                required:true,
                date: true
            },
            valor:{
                required:true
            },
            estado:{
                required:true
            }			
        }, 
        messages:{
            desc:{
                required:"Campo obrigatório"
            },
            responsavel:{
                required:"Campo obrigatório"
            },
            tconta:{
                required:"Campo obrigatório"
            },
            data:{
                required:"Campo obrigatório",
                date: "Data invalida"
            },
            valor:{
                required:"Campo obrigatório"
            },
            estado:{
                required:"Campo obrigatório"
            }		
        }
    }
);

$("#formRat").validate(
    {
        rules:{
            responsavel:{
                required: true
            },
            valorRateio:{
                required: true
            },
            situacao:{
                required: true
            }			
        }, 
        messages:{
            responsavel:{
                required:"Campo obrigatório"
            },
            valorRateio:{
                required:"Campo obrigatório"
            },
            situacao:{
                required:"Campo obrigatório"
            }	
        }
    }
);

