
<?php
try{
    // Connexion à la base
    $db = new PDO('mysql:host=localhost;dbname=my_shop', 'admin', 'arthur');
    $db->exec('SET NAMES "UTF8"');


} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}