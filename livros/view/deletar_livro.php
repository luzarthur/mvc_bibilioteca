<?php
  session_start();
  if (isset($_SESSION["email"]) and isset($_SESSION["senha"])) {
      if (isset($_SESSION["msg"])) {
          $alerta = $_SESSION["msg"];
  ?>
          <script>
              alert("<?php echo $alerta; ?>")
          </script>
  <?php
      } else {
      }
  } else {
      header('Location: http://localhost/mvc_biblioteca/usuarios/view/login.php');
  }
  unset($_SESSION["msg"]);
?>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/crud_usuarios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/favicon.ico" type="image/x-icon" rel="icon" />
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
                    <li><a href="http://localhost/mvc_biblioteca/livros/listEmprest">Devolver Livro</a></li>
                </ul>
            </li>
            <li><a href="#">Gerenciar Biblioteca</a>
                <ul>
                    <li><a href="cadastro_livro.php">Cadastrar Livro</a></li>
                    <li><a href="http://localhost/mvc_biblioteca/livros/listDeletar">Deletar Livro</a></li>
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

    <title>Solicitar Livro</title>
</head>

<body class="content">
    <br>
    <label style="font-family:Poppins, sans-serif" for="formGroupExampleInput">Selecione os livros que deseja deletar. </label><br>
    <label style="font-family:Poppins, sans-serif" for="formGroupExampleInput">Lembrando que somente livros não emprestados podem ser deletados!</label><br><br>

    <form action="http://localhost/mvc_biblioteca/?controller=livros&Action=deletar" method="POST">
        <table class=table table-bordless table-stripped table-dark>
            <tr>
                <td>Selecione</td>
                <td>ID</td>
                <td>Nome</td>
                <td>Autor</td>
                <td>Genero</td>
                <td>Status</td>

            </tr>
            <?php
            if (isset($_SESSION["data"])) {
                $retorno = $_SESSION["data"];
                foreach ($retorno as $value) {
            ?>
                    <tr>
                        <td><input type="radio" required id="1" name="escolha" value="<?= $value[0] ?>"></td>
                        <td><?php echo $value[0]; ?></td>
                        <td><?php echo $value[1]; ?></td>
                        <td><?php echo $value[2]; ?></td>
                        <td><?php echo $value[3]; ?></td>
                        <td><?php echo $value[4]; ?></td>
                    </tr>
            <?php }
            } else {
            } ?>
        </table>
        <input type="submit" class="btn btn-lg btn-block btn-Success" value="Deletar Livro(s)" onclick="return confirm('Deseja realmente deletar este livro ?')">
        <a href="http://localhost/mvc_biblioteca/livros/listDeletar"><buttton class="btn btn-lg btn-block btn-primary">Atualizar Lista</buttton></a>
    </form>
    
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- Footer -->
    <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2022 Biblioteca do Tutu:
            <a href="https://www.linkedin.com/in/arthur-luz-martins-b8b1b518a"> Arthur Luz Martins</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>

</html>
