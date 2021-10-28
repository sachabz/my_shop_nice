<?php

session_start();

if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['name']) && !empty($_POST['name'])
    && isset($_POST['price']) && !empty($_POST['price'])
    && isset($_POST['color']) && !empty($_POST['color'])){
       
        require_once('connect.php');

        $id = strip_tags($_POST['id']);
        $name = strip_tags($_POST['name']);
        $price = strip_tags($_POST['price']);
        $color = strip_tags($_POST['color']);
        $sexe = strip_tags($_POST['sexe']);


        $sql = 'UPDATE `products` SET `name`=:name, `price`=:price, `color`=:color, `sexe`=:sexe WHERE `id`=:id;';

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':price', $price, PDO::PARAM_INT);
        $query->bindValue(':color', $color, PDO::PARAM_STR);
         $query->bindValue(':sexe', $sexe, PDO::PARAM_STR);

        $query->execute();

       
        $_SESSION['message'] = "Produit modifié";
        require_once('close.php');



        header('Location: AdminProducts.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

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
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: AdminProducts.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>

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
                <h1>Modifier un produit</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="titre">Nom de l'article</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= $produit['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="couleur">Couleur</label><br>
                        <select name="color" id="color" name="color" class="form-control" value="<?= $produit['color']?>">
                           <option value="bleu">Bleu</option>
                           <option value="blanc">Blanc</option>
                           <option value="rouge">Rouge</option>
                           <option value="noir">Noir</option>
                           <option value="gris">Gris</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="taille">Taille</label><br>
                        <select name="size" id="size" name="size" class="form-control" value="<?= $produit['size'] ?>">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sexe">Genre</label><br>
                        <select name="sexe" id="sexe" name="sexe" class="form-control" value="<?= $produit['sexe']?>"> 
                           <option value="Femme">Femme</option>
                           <option value="Homme">Homme</option>
                        </select>   
                    </div>

                    <div class="form-group">
                        <label for="price">Prix</label><br>
                        <input type="number" id="price" name="price" value="0" class="form-control" value="<?= $produit['price']?>">
                    </div>

                    <div>  
                        <label for="photo">Photo</label><br>
                        <input type="file" id="photo" name="photo" class="form-control" value="<?= $produit['id']?>">
                    </div>
                    <br>
                    <input type="hidden" value="<?= $produit['id']?>" name="id">
                    <button class="btn btn-primary">Envoyer</button>
                    <a href="AddProduct.php" class="btn btn-primary">Ajouter un produit</a>
                    <a href="AdminProducts.php" class="btn btn-primary">Retour</a>
                </form>
            </section>
        </div>
    </main>
</body>
</html>