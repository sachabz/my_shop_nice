<?php 

define("DBHOST", "localhost:3306");
define("DBUSER", "admin"); 
define("DBPASS", "arthur");
define("DBNAME", "my_shop");

$dns = "mysql:dbname=".DBNAME.";host=".DBHOST;

    try{
        $db = new PDO($dns, DBUSER, DBPASS);

        $db->exec("SET NAMES utf8");

    echo "On est connectés";

}   catch(PDOException $e){
        die("Erreur:".$e->getMessage());
}
     $sql = "SELECT * FROM `products`";

     $requete = $db->query($sql);

     $user= $requete->fetch();

     echo "<pre>";
     var_dump($user);
     echo "</pre>";
© 2021 GitHub, Inc.
Terms
Privacy
