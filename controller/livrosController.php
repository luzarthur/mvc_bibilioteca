<?php
function __autoload($class_name)
{
    include "model/" . $class_name . ".php";
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
        if($msg == "livro cadastrado"){
            session_start();
            $_SESSION["msg"] = "Livro Cadastrado com sucesso!";
            header("Location: view/cadastro_livro.php");
        }
        if($msg == "livro ja existe"){
            session_start();
            $_SESSION["msg"] = "Os dados inseridos correspondem a um livro ja cadastrado em nossa biblioteca!";
            header("Location: view/cadastro_livro.php");
        }
    }
    public function deletar(){
        $model = new livrosModel();
        $vo = new livrosVO();

        $vo->setID($_POST["idLivro"]);
        $model->deletarModel($vo);

        $msg = $vo->getMsg();
        if($msg == "nao existe"){
            session_start();
            $_SESSION["msg"] = "Esse ID não corresponde a um livro cadastrado!";
            header("Location: view/deletar_livro.php");
        }else{
            session_start();
            $_SESSION["msg"] = "Livro deletado!";
            header("Location: view/deletar_livro.php");
        }
    }
    public function listALL(){
        $model = new livrosModel();
        
        $_SESSION["data"] = $model->listALLModel();
        header("Location: view/pesquisar.php");

    }
 
}
