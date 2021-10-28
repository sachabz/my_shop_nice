<?php
session_start();

require_once('connect.php');

$sql = 'SELECT * FROM `products`';

$query = $db->prepare($sql);

$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                <h1>Liste des produits</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nom du Produit</th>
                        <th>Prix</th>
                        <th>Taille disponible</th>
                        <th>Couleur</th>
                        <th>Categorie</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($result as $produit){
                        ?>
                            <tr>
                                <td><?= $produit['id'] ?></td>
                                <td><?= $produit['name'] ?></td>
                                <td><?= $produit['price'] ?></td>
                                <td><?= $produit['size'] ?></td>
                                <td><?= $produit['color'] ?></td>
                                <td><?= $produit['categorie'] ?></td>
                                <td><a href="DetailsProduct.php?id=<?= $produit['id'] ?>">Voir</a> <a href="EditProduct.php?id=<?= $produit['id'] ?>">Modifier</a> <a href="DeleteProduct.php?id=<?= $produit['id'] ?>">Supprimer</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="AddProduct.php" class="btn btn-primary">Ajouter un produit</a>
            </section>
        </div>
    </main>
</body>
</html>