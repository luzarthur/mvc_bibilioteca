<?php
    
     if(isset($_GET["controller"])){
         include "controller/".$_GET["controller"]."Controller.php";
 
         $class = $_GET["controller"]."Controller";
         $action =  $_GET["Action"]."()";
        
         eval("\$controller = new $class();");//eval — Executa uma string como código PHP
         if(isset($_GET["Action"])){
             eval("\$controller->$action;");
         }
     }else{
         echo "nada";
     }
?>
     
