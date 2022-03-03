<?php
    class usuariosModel{
        public function loginModel(usuariosVO $value){
            $user = new usuariosDAO();
            return $user->verifLogin($value);
        }
        public function criarUsuarioModel(usuariosVO $value){
            $user = new usuariosDAO();
            return $user->criarUsuario($value);
        }
    }
?>