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
    <title>Página de Login</title>
</head>
<body class="content">

    <div class="wrapper ">
        <div id="form-content">
          <!-- Titulos -->
          <h2 class="active"> Login </h2>
          <h2 class="inactive underlineHover"> <a href="inscricao.php">Criar Conta</a>  </h2>
    
     <!-- Logo -->
     <div class="logo">
        <img src="img/LogoMarca.png" id="logo" alt="User Logo" />
      </div>

    <!-- Formulario de Login -->
    <form method="POST" action="http://localhost/mvc_biblioteca/usuarios/login">
        <input type="email" id="email" name="email" class="input-form" required = "required"placeholder="Digite seu e-mail"><br>
        <input type="password" id="password" name ="senha"minlength="6"
        maxlength="8" size="10" class="input-form" name="senha" required =  "required" placeholder="Digite sua senha"><br>
        <input type="submit" class="button" value="Log In">
      </form>

     <!-- Esqueceu a senha -->
    <div id ="form-footer">
        <a class="underlineHover" href="redef_senha.php">Esqueceu sua senha?</a> 
    </div>
  </div>
</div>
      
</body>
</html>
