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
            <li><a href="home.php">Home</a></li>
            <li><a href="pesquisar.php">Pesquisar Livros</a></li>
            <li><a href="#">Meus livros</a>
                <ul>
                     <li><a href="pegar_livro.php">Solicitar Livro</a></li>
                     <li><a href="devolver_livro.php">Devolver Livro</a></li>
                  </ul>
           </li>
                  <li><a href="#">Gerenciar Biblioteca</a>
                     <ul>
                          <li><a href="cadastro_livro.html">Cadastrar Livro</a></li>
                          <li><a href="deletar_livro.php">Deletar Livro</a></li>
                       </ul>
                </li>
                <li><a href="#">Minha Conta</a>
                    <ul>
                         <li><a href="deleta_conta.php">Excluir Conta</a></li>
                         <li><a href="index.html">Fazer Logoff</a></li>
                      </ul>
               </li>
            
    </ul>
    </nav>
</head>
<body class="content">
        <script>
            function alerta(){
                    var teste = window.confirm('Deseja realmente devolver o livro ? Depois de confirmada, essa ação não poderá ser desfeita!!!');
                    if (teste == false){
                        window.location.replace('devolver_livro.php');
                    }   
                }
            </script>
        <br>
        <form action="" method="POST">
            <div class= "form-group">
                <label style="font-family:Poppins, sans-serif;"for="formGroupExampleInput">Digite o ID do livro que deseja devolver</label><br>
                <input type="text" class="input-form" id="digID" name="idLivro" required="required">
            </div><br>
            <input class="btn btn-lg btn-block btn-success" type="submit" value="Devolver" onclick=alerta()>
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