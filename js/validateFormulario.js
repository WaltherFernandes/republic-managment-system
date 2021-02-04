$(document).ready(function(){
  $('#CPF').mask('999.999.999-99');
  $('#celular').mask('(99)9.9999-9999');
});

$("#formulario").validate(
    {
        rules:{
            nome:{
                required:true			   
            },
            nasc:{
                  required:true,
                  date: true
            },
            contatos:{
              required:true
            },
            celular:{
              required:true
            },
            CPF:{
                required:true ,
                remote: {
                  url: "validates/moradorValidateCPF.php",
                  type: "post",
                  data: {
                    idMorador: function(){
                      return $("#idMorador").val();
                    }
                  }
                }
            },
            email:{
                required:true,
                email: true,
                remote: {
                  url: "validates/moradorValidateEmail.php",
                  type: "post",
                  data: {
                    idMorador: function(){
                      return $("#idMorador").val();
                    }
                  }
                }
            }				
        }, 
        messages:{
            nome:{
                required:"Campo obrigatório"
            },
            nasc:{
              required:"Campo obrigatório",
              date: "Data inválida"
            },
            imagem:{
              required:"Campo obrigatório"
            },
            celular:{
              required:"Campo obrigatório"
            },
            contatos:{
              required:"Campo obrigatório"
            },
            senha1:{
              required:"Campo obrigatório"
            },
            senha2:{
              required:"Campo obrigatório",
              equalTo: "As senhas não coincidem"
            },
            CPF:{
                required:"Campo obrigatório",
                remote: "Esse CPF já está cadastrado"
            },
            email:{
                required:"Campo obrigatório",
                email:"E-mail inválido",
                remote: "Esse e-mail já está cadastrado"
            }			
        }
    }
);