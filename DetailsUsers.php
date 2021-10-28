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
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: AdminUsers.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Détails du profil <?= $produit['name'] ?></h1>
                <p>ID : <?= $produit['id'] ?></p>
                <p>Prénom : <?= $produit['firstname'] ?></p>
                <p>Email : <?= $produit['email'] ?></p>
                <p>Téléphone : <?= $produit['phone'] ?></p>
                <p>Code postal : <?= $produit['postcode'] ?></p>
                <p>Ville : <?= $produit['ville'] ?></p>
                <p>Adresse : <?= $produit['address'] ?></p>
                <p><a href="AdminUsers.php" class="btn btn-primary">Retour</a> <a href="EditUsers.php?id=<?= $produit['id'] ?>" class="btn btn-primary">Modifier</a></p>
            </section>
        </div>
    </main>
</body>
</html>