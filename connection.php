<?php
//Archivo que conecta con la base de datos pasando por parametros el nombre y el tipo de conexión
 class Db extends PDO {
     private static $instance = NULL;
     private function __construct() {}
     private function __clone() {}
     
     public static function getInstance() {
            if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 self::$instance = new PDO('mysql:host=localhost;dbname=blog_php_mvc',
'root', '', $pdo_options);
 }
 return self::$instance;
 }
 }
?>
