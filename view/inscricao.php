<?php
  session_start();
  @$alerta = $_SESSION["msg"];
  if($alerta != null){
    echo"<script>alert('$alerta')</script>";
  }else{
  }
  session_unset();
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/crud_usuarios.css">
    <title>Criar conta</title>
</head>
<body class="content">
  <div class="wrapper ">
  <div id="form-content">
      <!-- Titulos -->
      <h2 class="active"> Criar Conta </h2>
      <h2 class="inactive underlineHover"> <a href="login.php">Login</a>  </h2>

    <!-- Logo -->
    <div class="logo">
      <img src="img/LogoMarca.png" id="logo" alt="User Logo" />
    </div>

    <!-- FORMULARIO PARA CRIAÇÃO DE USUARIO -->
    <form action= "http://localhost/mvc_biblioteca/?controller=usuarios&Action=criar" method= "post">
        <input type="email" id="email" class="input-form"name="email" required = "required"placeholder="Digite seu e-mail">
        <input type="text" id="login" class="input-form" name="nome" required = "required" placeholder="Digite seu nome">
        <input type="password" id="senha" minlength="6"
        maxlength="8" size="10" class="input-form" name="senha" required =  "required" placeholder="Crie sua senha">
        <input type="password" minlength="6"
        maxlength="8" size="10" id="senha2" class="input-form" name="senha2" required = "required" placeholder="Confirme sua senha">
        <input type="submit" class="button" id="enviardados" value="Gravar">
    </form>
     <!-- Verifica se as senhas são iguais   -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script>
       $(function(){
       $("#enviardados").click(function(){
           var senha = $("#senha").val();
           var senha2 = $("#senha2").val();
           if(senha != senha2){
             event.preventDefault();
             alert("As senhas não estão iguais!");
           }
         });
       });
     </script>
    <!-- Remind Passowrd -->
    <div id="form-footer">
      <a class="underlineHover" href="redef_senha.php">Esqueceu sua senha?</a>
    </div>

  </div>
</div>
</body>
</html>