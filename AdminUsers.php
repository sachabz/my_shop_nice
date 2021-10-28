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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FontAwesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS Links -->
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="my_shop.css">
</head>
<body>
<?php include_once("SearchBarAdmin.php")  ?>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>