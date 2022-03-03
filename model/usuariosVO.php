<?php 
    class usuariosVO{
        private $id;
        private $email;
        private $nome;
        private $senha;

        public function setID($id){
            $this->id = $id;
        }
        public function getID(){
            return $this->id;
        }
        
        public function setEmail($email){
            $this->email = $email;
        }
        public function getEmail(){
            return $this->email;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }
        public function getSenha(){
            return $this->senha;
        }
        
    }

?>