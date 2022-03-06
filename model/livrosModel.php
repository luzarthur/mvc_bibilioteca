<?php
    class livrosModel{
        public function cadastroModel(livrosVO $value){
            $livro = new livrosDAO();
            return $livro->cadastrar($value);
        }
    }

?>