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
    <title>Excluir conta</title>
</head>
<body class="content">

      <div class="wrapper ">
      <div id="form-content">
      <!-- Titulos -->
      <h2 class="active"> Excluir conta </h2>

       <!-- Logo -->
      <div class="logo">
            <img src="LogoMarca.PNG" id="logo" alt="User Logo" />
      </div>
        <script>
            function alerta(){
                  var teste = window.confirm('Deseja realmente excluir sua conta ? Depois de confirmada, essa ação não poderá ser desfeita!!!');
                  if (teste == false){
                        window.location.replace('login.html');
                }   
            }
        </script>
     <!-- Formulario de Login -->
     <form action="deleta_conta.php" method="POST">
        <input type="email" id="email" name="email" class="input-form" required = "required"placeholder="Digite seu e-mail">
        <input type="password" id="password" name ="senha"minlength="6"
        maxlength="8" size="10" class="input-form" name="senha" required =  "required" placeholder="Digite sua senha">
        <input type="submit" class="button" value="Deletar" onclick = alerta()>
      </form>
      </div>
</div>
</body>
</html>