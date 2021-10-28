<?php
session_start();

require_once('connexion.php');

/// SELECT ALL //
$sql = 'SELECT * FROM `products` ORDER BY price DESC';

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
            </section>
        </div>
                
        <div class="row">
                <?php
                foreach($result as $produit){
                ?>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <div class="card" style="width: 18rem;">
                        <i class="fa fa-tshirt"></i>
                        <div class="card-header">
                            <?= $produit['name'] ?>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= $produit['categorie'] ?></li>
                            <li class="list-group-item"><?= $produit['sexe'] ?></li>
                            <li class="list-group-item"><?= $produit['color'] ?></li>
                            <li class="list-group-item"><?= $produit['size'] ?></li>
                            <li class="list-group-item"><?= $produit['price'] . "€" ?></li>
                        </ul>
                    </div>
                </div>
                <br>
                <?php
                }
                ?>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
