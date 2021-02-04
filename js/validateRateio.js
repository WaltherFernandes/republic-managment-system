$("#formulario").validate(
    {
        rules:{
            responsavel:{
                required: true
            },
            val:{
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
            val:{
                required:"Campo obrigatório"
            },
            situacao:{
                required:"Campo obrigatório"
            }	
        }
    }
  );