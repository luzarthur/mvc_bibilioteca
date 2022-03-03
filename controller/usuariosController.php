<?php
function __autoload($class_name){
    include "model/".$class_name.".php";
}

    class usuariosController{
        
        public function login(){
            $model = new usuariosModel();
            $vo = new usuariosVO();

            $vo->setEmail($_POST["email"]);
            $vo->setSenha($_POST["senha"]);
            
           if ($model->loginModel($vo)){
              
           }
           //header("Location: view/home.html");
        }

        public function criar(){
            $model = new usuariosModel();
            $vo = new usuariosVO();
            $vo->setEmail($_POST["email"]);
            var_dump($vo->setEmail($_POST["email"]));
            $vo->setNome($_POST["nome"]);
            $vo->setSenha($_POST["senha"]);
            

            $model->criarUsuarioModel($vo);
        }
    }
?>