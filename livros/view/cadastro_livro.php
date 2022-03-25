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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="img/LogoMarca.png" width="70" height="70" alt="">
          </a>
        <ul class="menu">
            <li><a href="http://localhost/mvc_biblioteca/livros/listAll">Home</a></li>
            <li><a href="pesquisar.php">Pesquisar Livros</a></li>
            <li><a href="#">Meus livros</a>
                <ul>
                     <li><a href="http://localhost/mvc_biblioteca/livros/listDisp">Solicitar Livro</a></li>
                     <li><a href="devolver_livro.php">Devolver Livro</a></li>
                  </ul>
           </li>
                  <li><a href="#">Gerenciar Biblioteca</a>
                     <ul>
                          <li><a href="cadastro_livro.php">Cadastrar Livro</a></li>
                          <li><a href="deletar_livro.php">Deletar Livro</a></li>
                       </ul>
                </li>
                <li><a href="#">Minha Conta</a>
                    <ul>
                         <li><a href="http://localhost/mvc_biblioteca/usuarios/view/deleta_conta.php">Excluir Conta</a></li>
                         <li><a href="http://localhost/mvc_biblioteca/usuarios/view/login.php">Fazer Logoff</a></li>
                      </ul>
               </li>
            
    </ul>
    </nav>
    <title>Cadstro de Livros</title>
    
</head>
<body class="content" >
    <div class="wrapper ">
        <div id="form-content">
          <!-- Titulos -->
          <h2 class="active"> Cadastrar livros </h2>
          <h2 class="inactive underlineHover"> <a style="color: black;text-decoration: none;"href="deletar_livro.php">Deletar livros</a>  </h2>

    <form action="http://localhost/mvc_biblioteca/?controller=livros&Action=cadastrar" method="post">
        <input type="text" id="livro" name="livro" class="input-form" required="required" placeholder="Digite o nome do livro" maxlength="20"><br>
        <input type="text" id="autor" name="autor" class="input-form" required="required" placeholder="Digite o nome do autor" maxlength="20"><br>
        <select class="input-form" name="opcao">
            <option value="Aventura">Aventura</option>
            <option value="Comedia">Comedia</option>
            <option value="Poesia">Poesia</option>
            <option value="Drama">Drama</option>
            <option value="Ficção Cientifica">Ficção Cientifica</option>
            <option value="Terror">Terror</option>
            <option value="Infantil">Infantil</option>
            <option value="Ação">Ação</option>
        </select><br>
        <input type="submit" class="btn btn-lg btn-block btn-success" id="envia_livro" value = "Cadastrar">
        <input type="reset" class="btn btn-lg  btn-block btn-danger">
        
    </form>
    </div>
</div>
    
</body>
<!-- Footer -->
<footer class="page-footer font-small blue">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2022 Biblioteca do Tutu:
      <a href="https://www.linkedin.com/in/arthur-luz-martins-b8b1b518a"> Arthur Luz Martins</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
</html>