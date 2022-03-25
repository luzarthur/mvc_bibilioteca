<?php
  session_start();
  if(isset($_SESSION["msg"])){
    $alerta = $_SESSION["msg"];
?>
    <script>alert("<?php echo $alerta; ?>")</script>
  <?php 
  }else{
  }
  session_unset();
  session_destroy();
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/crud_usuarios.css">
    <title>Redefinir senha</title>
</head>
<body class= "content">
  <div class="wrapper ">
  <div id="form-content">
      <!-- Titulos -->
      <h2 class="active"> Redefinir Senha </h2>

       <!-- Logo -->
    <div class="logo">
      <img src="img/LogoMarca.png" id="logo" alt="User Logo" />
    </div>
      
    <!-- Formulario para nova senha -->
    <form action="http://localhost/mvc_biblioteca/?controller=usuarios&Action=redef_senha" method="POST">
        <input type="email" id="email" name="email" class="input-form" required = "required"placeholder="Digite seu e-mail">
        <input type="password" id="senha3" name ="senha"minlength="6"
        maxlength="8" size="10" class="input-form" name="senha3" required =  "required" placeholder="Digite sua nova senha">
        <input type="password" minlength="6"
        maxlength="8" size="10" id="senha4" class="input-form" name="senha4" required = "required" placeholder="Confirme sua senha">
        <input type="submit" class="button" id="mudardados" value="Enviar">
      </form>

     <!-- Verifica se as senhas são iguais   -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script>
       $(function(){
       $("#mudardados").click(function(){
           var senha = $("#senha3").val();
           var senha2 = $("#senha4").val();
           if(senha != senha2){
             event.preventDefault();
             alert("As senhas não estão iguais!");
           }
         });
       });
     </script>
  </div>
</div>
    
</body>
</html>