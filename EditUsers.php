<?php

session_start();

if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['name']) && !empty($_POST['name'])
    && isset($_POST['phone']) && !empty($_POST['phone'])
    && isset($_POST['email']) && !empty($_POST['email'])){
       
        require_once('connect.php');

        $id = strip_tags($_POST['id']);
        $firstname = strip_tags($_POST['firstname']);
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $phone = strip_tags($_POST['phone']);
        $postcode = strip_tags($_POST['postcode']);
        $ville = strip_tags($_POST['ville']);
        $address = strip_tags($_POST['address']);


        $sql = 'UPDATE `users` SET `firstname`=:firstname,`name`=:name, `email`=:email, `phone`=:phone, `postcode`=:postcode, `ville`=:ville, `address`=:address WHERE `id`=:id;';

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':firstname', $name, PDO::PARAM_STR);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':email', $email);
        $query->bindValue(':phone', $phone, PDO::PARAM_STR);
        $query->bindValue(':postcode', $postcode, PDO::PARAM_STR);
        $query->bindValue(':ville', $ville, PDO::PARAM_STR);
        $query->bindValue(':address', $address, PDO::PARAM_STR);

        $query->execute();

       
        $_SESSION['message'] = "Produit modifié";
        require_once('close.php');



        header('Location: AdminUsers.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

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
                <h1>Modifier un utilisateur</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $produit['firstname']?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= $produit['name']?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?= $produit['email']?>">
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="<?= $produit['phone']?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="postcode">Code postal</label>
                        <input type="text" id="postcode" name="postcode" class="form-control" value="<?= $produit['postcode']?>">
                    </div>

                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" id="ville" name="ville" class="form-control" value="<?= $produit['ville']?>">
                    </div>

                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" name="address" class="form-control" value="<?= $produit['address']?>">
                    </div>






                    <br>
                    <input type="hidden" value="<?= $produit['id']?>" name="id">
                    <button class="btn btn-primary">Envoyer</button>
                    <a href="AddProduct.php" class="btn btn-primary">Ajouter un utilisateur</a>
                    <a href="AdminUsers.php" class="btn btn-primary">Retour</a>
                </form>
            </section>
        </div>
    </main>
</body>
</html>