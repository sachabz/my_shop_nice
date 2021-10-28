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
    <title>Liste des produits</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


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
                                <a class="nav-link text-black" name="linkHomme" href="?link=1">HOMMES
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black" name="linkFemme" href="?link=2">FEMMES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black" name="linkAll" href="?link=3">TOUS LES T-SHIRTS</a>
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

<div id="mainSection">
            <?php
        if(isset($_GET['link'])){
            $link=$_GET['link'];
            if ($link == '1'){
                include 'viewHomme.php';
            }
            if ($link == '2'){
                include 'viewFemme.php';
            }
            if ($link == '3'){
                include 'viewAll.php';
            } 
        }else {
            include 'viewAll.php';
        }
            ?>  
</div>

    <?php include_once("footer.html") ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>