<?php
session_start();

if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `products` WHERE `id` = :id;';

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    $produit = $query->fetch();

    if(!$produit){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: AdminProducts.php');
        die();
    }

    $sql = 'DELETE FROM `products` WHERE `id` = :id;';

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();
    $_SESSION['message'] = "Produit supprimé";
    header('Location: AdminProducts.php');


}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: AdminProducts.php');
}
