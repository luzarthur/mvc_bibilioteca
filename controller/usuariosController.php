<?php
function __autoload($class_name)
{
    include "model/" . $class_name . ".php";
}

class usuariosController
{

    public function login()
    {
        $model = new usuariosModel();
        $vo = new usuariosVO();

        $vo->setEmail($_POST["email"]);
        $vo->setSenha($_POST["senha"]);
        $model->loginModel($vo);

        $status = $vo->getStatus();
        if($status == "erro de email"){
            session_start();
            $_SESSION["msg"] = "Email inserido não corresponde a um usuario cadastrado! Altere o email ou crie sua conta!";
            header("Location: view/login.php");
        }
        if($status == "erro de senha"){
            session_start();
            $_SESSION["msg"] = "Senha Incorreta!";
            header("Location: view/login.php");
        }
        if($status == "login ok"){
            session_start();
            $_SESSION["msg"] = "Login Realizado!";
            header("Location: view/home.php");
        }

    }

    public function criar()
    {
        $model = new usuariosModel();
        $vo = new usuariosVO();
        $vo->setEmail($_POST["email"]);
        $vo->setNome($_POST["nome"]);
        $vo->setSenha($_POST["senha"]);
        $model->criarUsuarioModel($vo);

        $status = $vo->getStatus();
        //var_dump($status);
        if($status == "erro de email"){
            session_start();
            $_SESSION["msg"] = "Email inserido já foi cadastrado!Faça login ou altere o email digitado";
            header("Location: view/inscricao.php");
        }
        if($status == "cadastro ok"){
            session_start();
            $_SESSION["msg"] = "Cadastro realizado com sucesso!";
            header("Location: view/home.php");
        }
    }

    public function redef_senha(){
        $model = new usuariosModel();
        $vo = new usuariosVO();

        $vo->setEmail($_POST["email"]);
        $vo->setSenha($_POST["senha"]);
        $model->mudarSenha($vo);

        $status = $vo->getStatus();
        if($status == "erro de email"){
            session_start();
            $_SESSION["msg"] = "Email inserido não corresponde a um usuario cadastrado! Altere o email ou crie sua conta! ";
            header("Location: view/redef_senha.php");
        }
        if($status == "senha alterada"){
            session_start();
            $_SESSION["msg"] = "Senha alterada com sucesso!";
            header("Location: view/home.php");
        }
    }

    public function deletarConta(){
        $model = new usuariosModel();
        $vo = new usuariosVO();

        $vo->setEmail($_POST["email"]);
        $vo->setSenha($_POST["senha"]);
        $model->deletarConta($vo);

        $status = $vo->getStatus();
        if($status == "erro de email"){
            session_start();
            $_SESSION["msg"] = "Email inserido não corresponde a um usuario cadastrado! Altere o email ou crie sua conta!";
            header("Location: view/deleta_conta.php");
        }
        if($status == "erro de senha"){
            session_start();
            $_SESSION["msg"] = "Senha Incorreta!";
            header("Location: view/deleta_conta.php");
        }
        if($status == "conta deletada"){
            session_start();
            $_SESSION["msg"] = "conta deletada";
            header("Location: view/login.php");
        }
    }
}
