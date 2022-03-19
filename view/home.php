<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/crud_usuarios.css">
    <link rel="stylesheet" type="text/css" href="css/slide_home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="img/LogoMarca.png" width="70" height="70" alt="">
          </a>
        <ul class="menu">
            <li><a href="http://localhost/mvc_biblioteca/?controller=livros&Action=listAll">Home</a></li>
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

    <title>Home</title>
</head>
<body>
    <br><br>
    <div class="container">
        <div class="slider">
            <img class="fotos" src="img/img1.jpg" />
            <img class="fotos" src="img/img2.jpg" />
            <img class="fotos" src="img/img3.jpg" />
            <img class="fotos" src="img/img4.jpg" />
        </div>
    <br><br><br>
    <label style="font-family:Poppins, sans-serif;"for="formGroupExampleInput">Confira alguns dos livros disponiveis em nossa biblioteca:</label><br>
    <label style="font-family:Poppins, sans-serif;"for="formGroupExampleInput">Se se interssar por algum, acesse o menu "Meus Livros" e selecione "Solicitar Livros".</label><br>
    <br><br>
    <table class=table table-bordless table-stripped table-dark>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Autor</td>
            <td>Genero</td>
            <td>Status</td>
            
        </tr>
        <?php
            session_start();
            $retorno = $_SESSION["data"];
            foreach($retorno as $value){
        ?>
        <tr>
            <td><?php echo $value[0];?></td>
            <td><?php echo $value[1];?></td>
            <td><?php echo $value[2];?></td>
            <td><?php echo $value[3];?></td>
            <td><?php echo $value[4];?></td>
        </tr>
        <?php } ?>
    </table>
    
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

