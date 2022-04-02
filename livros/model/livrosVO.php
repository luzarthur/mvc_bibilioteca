<?php
    class livrosVO{
        private $id;
        private $nome;
        private $autor;
        private $genero;
        private $status;
        private $msg;
        private $usuario;

        public function setID($id){
            $this->id = $id;
        }
        public function getID(){
            return $this->id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }

        public function setAutor($autor){
            $this->autor = $autor;
        }
        public function getAutor(){
            return $this->autor;
        }

        public function setGenero($genero){
            $this->genero = $genero;
        }
        public function getGenero(){
            return $this->genero;
        }

        public function setStatus($status){
            $this->status = $status;
        }
        public function getStatus(){
            return $this->status;
        }

        public function setMsg($msg){
            $this->msg = $msg;
        }
        public function getMsg(){
            return $this->msg;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        public function getUsuario(){
            return $this->usuario;
        }
    }


?>