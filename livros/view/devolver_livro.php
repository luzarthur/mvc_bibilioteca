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
    <title>Devolver_livro</title>

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
</head>

<body class="content">
    <script>
        function alerta() {
            var teste = window.confirm('Deseja realmente devolver o livro ? Depois de confirmada, essa ação não poderá ser desfeita!!!');
            if (teste == false) {
                window.location.replace('devolver_livro.php');
            }
        }
    </script>
    <br>
    <label style="font-family:Poppins, sans-serif" for="formGroupExampleInput">Estes são os livros que você adquiriu,selecione um e clique em "Devolver" caso queira</label><br><br>
    <br>
    <form action="http://localhost/mvc_biblioteca/livros/devolver" method="POST">
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
            //session_start();
            if (isset($_SESSION["data1"])) {
                $retorno = $_SESSION["data1"];
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
        <input class="btn btn-lg btn-block btn-success" type="submit" value="Devolver" onclick=alerta()>
        <a href="http://localhost/mvc_biblioteca/livros/listEmprest"><buttton class="btn btn-lg btn-block btn-primary">Atualizar Lista</buttton></a>
    </form>

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