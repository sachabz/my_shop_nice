<?php
session_start();

require_once('connexion.php');

/// SELECT ALL //
$sql = 'SELECT * FROM `products`';

$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

/// SELECT HOMME //
$sql2 = 'SELECT * FROM `products` WHERE categorie="homme"' ;

$query2 = $db->prepare($sql2);
$query2->execute();
$result_homme = $query2->fetchAll(PDO::FETCH_ASSOC);

/// SELECT FEMME //
$sql3 = 'SELECT * FROM `products` WHERE categorie="homme"' ;

$query3 = $db->prepare($sql3);
$query3->execute();
$result_femme = $query3->fetchAll(PDO::FETCH_ASSOC);

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
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 ml-1 mr-1 mt-1 mb-1">
                    <div class="card" style="width: 18rem;">
                        <i class="fa fa-tshirt"></i>
                        <div class="card-header">
                            <?= $produit['name'] ?>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= $produit['categorie'] ?></li>
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

    <?php include_once("footer.html") ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>

    <body>
        <section class="container" style="background-color: white;">
            <h1 class="d-none">Navbar</h1>
            <nav class="navbar navbar-expand-lg navbar-light navbar-light" style="background-color: white;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
                            aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarColor03" style="background-color: white;">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="#">HOMMES
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black" href="#">FEMMES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black" href="#">COLLECTION</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black" href="#">PROMOTION</a>
                                </li>
                        </ul>
                        <div class="d-flex">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fa fa-shopping-cart text-black"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="#">connexion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </section>
    </body>
</html>