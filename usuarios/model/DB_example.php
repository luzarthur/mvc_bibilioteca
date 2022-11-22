<?php
    class DB{
        private $conn;
        public $sql;
        public function getConnection(){
            try{
                $server = "";
                $usuario = ""; 
                $senha = ""; 
                $banco = "";
                $this->conn = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senha);
                $this->conn->exec("set names utf-8");
            }catch(PDOException $e){
                echo "Erro do PDO ".$e->getMessage();
            }catch(Exception $e){
                echo "Erro ".$e->getMessage();
            }
        
        }
        public function execSql($sql){
            return $this->conn->prepare($sql);
        }
    }
?>