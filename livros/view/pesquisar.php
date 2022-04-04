<?php
    session_start();
    if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
        session_commit();
    }else{
        header('Location: http://localhost/mvc_biblioteca/usuarios/view/login.php');
    }

?>

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
    <title>Pesquisar</title>
</head>

<body class="content">

    <form action="http://localhost/mvc_biblioteca/livros/listPesq" method="POST">
        <div class="form-group">
            <label style="font-family:Poppins, sans-serif;" for="formGroupExampleInput">Digite o que procura</label><br>
            <input type="search" class="input-form" id="pesquisar" name="pesquisar">
        </div><br>
        <div class="form-group">
            <label style="font-family:Poppins, sans-serif;" for="formGroupExampleInput2">Selecione um filtro para pesquisar</label><br>
            <select class="input-form" name="opcao">
                <option value="livro">Livro</option>
                <option value="autor">Autor</option>
                <option value="genero">Genero</option>
            </select>
        </div><br>
        <input class="btn btn-lg btn-block btn-success" type="submit" value="Pesquisar">
        <input class="btn btn-lg  btn-block btn-danger" type="reset"><br><br>

    </form>
    <?php
    //session_start();
    if (isset($_SESSION["data"])) {
    ?>
        <table class=table table-bordless table-stripped table-dark>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Autor</td>
                <td>Genero</td>
                <td>Status</td>

            </tr>
            <?php
            $retorno = $_SESSION["data"];
            foreach ($retorno as $value) {
            ?>
                <tr>
                    <td><?php echo $value[0]; ?></td>
                    <td><?php echo $value[1]; ?></td>
                    <td><?php echo $value[2]; ?></td>
                    <td><?php echo $value[3]; ?></td>
                    <td><?php echo $value[4]; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else {
    }
    session_unset();
    //session_destroy();
    ?>
</body>

</html>