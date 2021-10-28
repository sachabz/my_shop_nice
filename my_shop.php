<?php
session_start();

require_once('connexion.php');

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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FontAwesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS Links -->
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" type="text/css" href="my_shop.css">

    <title>Liste des produits</title>



</head>
<body>
    <!--NAVBAR-->
    
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
                                    <a class="nav-link text-black" name="linkAll" href="?link=all">TOUS LES T-SHIRTS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-black" name="linkHomme" href="?link=homme">HOMMES
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-black" name="linkFemme" href="?link=femme">FEMMES</a>
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
                                        <a class="nav-link text-black" href="./inscription.php">connexion</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </section>   
<!--NAVBAR-->


<!--FILTRE-->
            <section class="container mb-5" style="background-color: white;">
            <h1 class="d-none">Filters</h1>
                <div class="row">
                    <div class="col-1">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Taille
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="?link=S">S</a>
                                <a class="dropdown-item" href="?link=M">M</a>
                                <a class="dropdown-item" href="?link=L">L</a>
                                <a class="dropdown-item" href="?link=XL">XL</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Couleur
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="?link=bleu">Bleu</a>
                                <a class="dropdown-item" href="?link=blanc">Blanc</a>
                                <a class="dropdown-item" href="?link=rouge">Rouge</a>
                                <a class="dropdown-item" href="?link=noir">Noir</a>
                                <a class="dropdown-item" href="?link=gris">Gris</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Catégorie
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="?link=courte">Manches courtes</a>
                                    <a class="dropdown-item" href="?link=longue">Manches longues</a>
                                </div>
                            </div>
                        </div>
                </div>
            </section>
            
<!--FILTRE-->

<!--AFFICHAGE MAIN-->

            <section class="container" style="background-color: white;">
                <div id="mainSection">
                            <?php
                        if(isset($_GET['link'])){
                            $link=$_GET['link'];
                            if ($link == 'homme'){
                                include 'viewHomme.php';
                            }
                            if ($link == 'femme'){
                                include 'viewFemme.php';
                            }
                            if ($link == 'all'){
                                include 'viewAll.php';
                            } 
                            if ($link == 'S'){
                                include 'viewS.php';
                            } 
                            if ($link == 'M'){
                                include 'viewM.php';
                            } 
                            if ($link == 'L'){
                                include 'viewL.php';
                            } 
                            if ($link == 'XL'){
                                include 'viewXL.php';
                            } 
                            if ($link == 'bleu'){
                                include 'viewBleu.php';
                            } 
                            if ($link == 'blanc'){
                                include 'viewBlanc.php';
                            } 
                            if ($link == 'rouge'){
                                include 'viewRlanc.php';
                            } 
                            if ($link == 'noir'){
                                include 'viewNoir.php';
                            } 
                            if ($link == 'gris'){
                                include 'viewGris.php';
                            } 
                            if ($link == 'longue'){
                                include 'viewML.php';
                            } 
                            if ($link == 'courte'){
                                include 'viewMC.php';
                            } 
                        }else {
                            include 'viewAll.php';
                        }
                            ?>  
                </div>
<!--NAVBAR AFFICHAGE MAIN-->

    <?php include_once("footer.html") ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>