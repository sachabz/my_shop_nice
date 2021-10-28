<?php 

define("DBHOST", "localhost:3306");
define("DBUSER", "admin"); 
define("DBPASS", "sacha");
define("DBNAME", "my_shop");

$dns = "mysql:dbname=".DBNAME.";host=".DBHOST;

try{
    $db = new PDO($dns, DBUSER, DBPASS);

    $db->exec("SET NAMES utf8");

}catch(PDOException $e){
    die("Erreur:".$e->getMessage());
}