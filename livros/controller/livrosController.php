<?php
function __autoload($class_name)
{
    include "livros/model/" . $class_name . ".php";
}

class livrosController
{
    public function cadastrar()
    {
        $model = new livrosModel();
        $vo = new livrosVO();

        $vo->setNome($_POST["livro"]);
        $vo->setAutor($_POST["autor"]);
        $vo->setGenero($_POST["opcao"]);
        $model->cadastroModel($vo);

        $msg = $vo->getMsg();
        if ($msg == "livro cadastrado") {
            session_start();
            $_SESSION["msg"] = "Livro Cadastrado com sucesso!";
            header("Location: livros/view/cadastro_livro.php");
        }
        if ($msg == "livro ja existe") {
            session_start();
            $_SESSION["msg"] = "Os dados inseridos correspondem a um livro ja cadastrado em nossa biblioteca!";
            header("Location: livros/view/cadastro_livro.php");
        }
    }
    public function deletar()
    {
        $model = new livrosModel();
        $vo = new livrosVO();

        $vo->setID($_POST["idLivro"]);
        $model->deletarModel($vo);

        $msg = $vo->getMsg();
        if ($msg == "nao existe") {
            session_start();
            $_SESSION["msg"] = "Esse ID não corresponde a um livro cadastrado!";
            header("Location: livros/view/deletar_livro.php");
        } else {
            session_start();
            $_SESSION["msg"] = "Livro deletado!";
            header("Location: livros/view/deletar_livro.php");
        }
    }
    public function listALL()
    {
        session_start();
        $model = new livrosModel();
        $_SESSION["data"] = $model->listALLModel();
        header("Location: http://localhost/mvc_biblioteca/livros/view/home.php");
    }
    public function listPesq()
    {
        $model = new livrosModel();
        $vo = new livrosVO();

        $vo->setNome($_POST["pesquisar"]);
        if ($_POST["opcao"] == "livro") {
            $vo->setNome($_POST["pesquisar"]);
            session_start();
            $_SESSION["data"] = $model->listByName($vo);
            header("Location: http://localhost/mvc_biblioteca/livros/view/pesquisar.php");
        }
        if ($_POST["opcao"] == "autor") {
            $vo->setAutor($_POST["pesquisar"]);
            session_start();
            $_SESSION["data"] = $model->listByAutor($vo);
            header("Location: http://localhost/mvc_biblioteca/livros/view/pesquisar.php");
        }
        if ($_POST["opcao"] == "genero") {
            $vo->setGenero($_POST["pesquisar"]);
            session_start();
            $_SESSION["data"] = $model->listByGenero($vo);
            header("Location: http://localhost/mvc_biblioteca/livros/view/pesquisar.php");
        }
    }

    public function listDisp()
    {
        session_start();
        $model = new livrosModel();
        $_SESSION["data"] = $model->listDispModel();
        header("Location: http://localhost/mvc_biblioteca/livros/view/pegar_livro.php"); 
    }

    public function listEmprest()
    {
        session_start();
        $model = new livrosModel();
        $vo = new livrosVO();
        $vo->setUsuario($_SESSION["email"]);
        $_SESSION["data1"] = $model->listEmprestModel($vo);
        header("Location: http://localhost/mvc_biblioteca/livros/view/devolver_livro.php"); 
    }

    public function emprestar()
    {
        session_start();
        $model = new livrosModel();
        $vo = new livrosVO();

        $vo->setID($_POST["escolha"]);
        $vo->setUsuario($_SESSION["email"]);
        $model->emprestarModel($vo);
        $msg = $vo->getMsg();
        
        if ($msg == "livro emprestado") {
            session_start();
            $_SESSION["msg"] = "Livro adquirido! Boa leitura!";
            header("Location: http://localhost/mvc_biblioteca/livros/listDisp");
        }
    }

    public function devolver()
    {
        $model = new livrosModel();
        $vo = new livrosVO();
        
        $vo->setID($_POST["escolha"]);
        $vo->setUsuario('null');
        $model->devolverModel($vo);
        $msg = $vo->getMsg();

        if($msg == "status igual"){
            session_start();
            $_SESSION["msg"] = "ID inserido não corresponde a um livro emprestado, verifique e tente novamente!";
            header("Location: http://localhost/mvc_biblioteca/livros/view/devolver_livro.php");
        }else{
            $msg = $vo->setMsg("livro devolvido");
            session_start();
            $_SESSION["msg"] = "Livro devolvido!Obrigado e volte sempre!";
            header("Location: http://localhost/mvc_biblioteca/livros/view/devolver_livro.php");
        }

    }
}
