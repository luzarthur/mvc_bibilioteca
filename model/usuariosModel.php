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
        public function mudarSenha(usuariosVO $value){
            $user = new usuariosDAO();
            return $user->mudarSenha($value);
        }
        public function deletarConta(usuariosVO $value){
            $user = new usuariosDAO();
            return $user->deletar($value);
        }
    }
?>