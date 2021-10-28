<?php
session_start();

if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `users` WHERE `id` = :id;';

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    $produit = $query->fetch();

    if(!$produit){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: AdminUsers.php');
        die();
    }

    $sql = 'DELETE FROM `users` WHERE `id` = :id;';

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();
    $_SESSION['message'] = "Produit supprimé";
    header('Location: AdminUsers.php');


}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: AdminUsers.php');
}
