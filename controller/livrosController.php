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
            header("Location: cadastro_livro.php");
        }
        if($msg == "livro ja existe"){
            session_start();
            $_SESSION["msg"] = "Os dados inseridos correspondem a um livro ja cadastrado em nossa biblioteca!";
            header("Location: view/cadastro_livro.php");
        }
    }
}
