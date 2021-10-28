<?php
session_start();

require_once('connect.php');

$sql = 'SELECT * FROM `users`';

$query = $db->prepare($sql);

$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
            <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
                <?php
                    if(!empty($_SESSION['message'])){
                        echo '<div class="alert alert-success" role="alert">
                                '. $_SESSION['message'].'
                            </div>';
                        $_SESSION['message'] = "";
                    }
                ?>
                <h1>Liste des membres</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Prénoms</th>
                        <th>Noms</th>
                        <th>Email</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Adresse</th>
                        <th>Numéro de téléphone</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($result as $produit){
                        ?>
                            <tr>
                                <td><?= $produit['id'] ?></td>
                                <td><?= $produit['firstname'] ?></td>
                                <td><?= $produit['name'] ?></td>
                                <td><?= $produit['email'] ?></td>
                                <td><?= $produit['postcode'] ?></td>
                                <td><?= $produit['ville'] ?></td>
                                <td><?= $produit['address'] ?></td>
                                <td><?= $produit['phone'] ?></td>
                                <td><a href="DetailsUsers.php?id=<?= $produit['id'] ?>">Voir</a> <a href="EditUsers.php?id=<?= $produit['id'] ?>">Modifier</a> <a href="DeleteUsers.php?id=<?= $produit['id'] ?>">Supprimer</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="AddUsers.php" class="btn btn-primary">Ajouter un utilisateur</a>
            </section>
        </div>
    </main>
</body>
</html>