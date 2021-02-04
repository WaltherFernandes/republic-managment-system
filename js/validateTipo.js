$("#formulario").validate(
  {
      rules:{
          tipo:{
              required: true,
              remote: {
                url: "validates/tipoContaValidate.php",
                type: "post",
                data: {
                  idTipo: function(){
                    return $("#idTipo").val();
                  }
                }
              }
          }			
      }, 
      messages:{
          tipo:{
              required:"Campo obrigatório",
              remote: "Esse tipo de conta já está cadastrado"
          }	
      }
  }
);