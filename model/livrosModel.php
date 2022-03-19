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
            $livro = new livrosDAO();
            $sql = "SELECT * FROM livros;";
            return $livro->listar($sql);
        }
        public function listByName(livrosVO $value){
            $livro = new livrosDAO();
            $nome = $value->getNome();
            $sql = "SELECT * FROM livros where nome like '%$nome%'";
            return $livro->listar($sql);
        }
        public function listByAutor(livrosVO $value){
            $livro = new livrosDAO();
            $autor = $value->getAutor();
            $sql = "SELECT * FROM livros where autor like '%$autor%'";
            return $livro->listar($sql);
        }
        public function listByGenero(livrosVO $value){
            $livro = new livrosDAO();
            $genero = $value->getGenero();
            $sql = "SELECT * FROM livros where genero like '%$genero%'";
            return $livro->listar($sql);
        }
        public function listDispModel(){
            $livro = new livrosDAO();
            $sql = "SELECT * FROM livros where Status = 'Disponivel';";
            return $livro->listar($sql);
        }

    }

?>