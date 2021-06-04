<!DOCTYPE html>
<html >
   <head>
      <meta charset="UTF-8">
      <title>Gerar Certificado PDF em PHP - Enviando por e-mail</title>
      <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
      <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
      <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>
   </head>
   <body>
      <div class="container">
         <form class="form-horizontal" action="gerar_certificado/gerador.php" method="post"  id="contact_form">
            <fieldset>
               <center>
                  <h1>Gere seu certificado online</h1>
               </center>
               <p>&nbsp;</p>
               <div class="form-group">
                  <label class="col-md-4 control-label">Nome</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="nome" placeholder="Nome completo" class="form-control"  type="text">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">E-Mail</label>  
                  <div class="col-md-4 inputGroupContainer">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail" class="form-control"  type="text">
                     </div>
                  </div>
               </div>
               
     
      <div class="form-group">
      <label class="col-md-4 control-label"></label>
      <div class="col-md-4">
      <button type="submit" class="btn btn-default col-md-12" >Gerar Certificado <span class="glyphicon glyphicon-download-alt"></span></button>
      </div>
      </div>
      </fieldset>
      </form>
      </div>
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
      <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

      <!-- ****** Simples função de colocar mascara em javascript ****** -->
      <script>  function formatar(mascara, documento){   
         var i = documento.value.length;
         var saida = mascara.substring(0,1);
         var texto = mascara.substring(i);
         if (texto.substring(0,1) != saida){documento.value += texto.substring(0,1);}
         }
      </script>

      <!-- ****** Validando o formulário (inclusive o CPF) ****** -->
      <script>
      $(document).ready(function() {
          $('#contact_form').bootstrapValidator({
              feedbackIcons: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  nome: {
                      validators: {
                          stringLength: {
                              min: 2,
                          },
                          notEmpty: {
                              message: 'Insira o seu nome'
                          }
                      }
                  },
                  email: {
                      validators: {
                          notEmpty: {
                              message: 'Insira o seu e-mail'
                          },
                          emailAddress: {
                              message: 'E-mail incorreto'
                          }
                      }
                  }
                  
          })

      });
      </script>
   </body>
</html>
