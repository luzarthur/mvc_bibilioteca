<?php
    class livrosModel{
        public function cadastroModel(livrosVO $value){
            $livro = new livrosDAO();
            return $livro->cadastrar($value);
        }
        public function deletarModel(livrosVO $value){
            $livros = new livrosDAO();
            return $livros->deletar($value);
        }
        public function listALLModel(){
            $livros = new livrosDAO();
            return $livros->listAll();
        }
    }

?>