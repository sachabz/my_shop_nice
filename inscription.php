<?php

$ID=$_POST["ID"];
$firstname=$_POST["firstname"];
$name=$_POST["name"];
$email =$_POST["email"];
$password=$_POST['password'];
$postcode =$_POST["postcode"];
$ville=$_POST['ville'];
$address=$_POST['address'];
$phone=$_POST["phone"];

include_once("connect.php");

    if(!empty($_POST)){

        if(
            isset($_POST["name"], $_POST["firstname"])
            && !empty($_POST["name"]) && !empty($_POST["firstname"])
        ){ 
        $password=md5($password);
        $sql = "INSERT INTO users(ID, firstname, name, email, postcode, ville, address, phone, password) VALUES (:ID, :firstname, :name, :email, :postcode, :ville, :address, :phone, :password)";  

        $querry = $db->prepare($sql);

        $querry->bindValue(":ID", $ID, PDO::PARAM_INT);
        $querry->bindValue(":firstname", $firstname, PDO::PARAM_STR);
        $querry->bindValue(":name", $name, PDO::PARAM_STR);
        $querry->bindValue(":email", $email, PDO::PARAM_STR);
        $querry->bindValue(":postcode", $postcode, PDO::PARAM_STR);
        $querry->bindValue(":ville", $ville, PDO::PARAM_STR);
        $querry->bindValue(":address", $address, PDO::PARAM_STR);
        $querry->bindValue(":phone", $phone, PDO::PARAM_STR);
        $querry->bindValue(":password", $password, PDO::PARAM_STR);
    
        if(!$querry->execute()){
             die("Une erreur est survenue");
        }
    
       $_SESSION['message'] = "Produit ajouté";
        require_once('close.php');

        header('Location: AdminUsers.php');

    }else{
            die("Le formulaire est imcomplet");
        }     

    }    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>

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
                <h1>Ajouter un utilisateur</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="firstname">Prénom:</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Luc" class="form-control">
                    </div>
                    
                   <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" id="name" name="name" placeholder="Dupont de Ligonnès" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Mots de passe</label>
                        <input type="password" id="password" name="password" placeholder="******" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Confirmer votre mots de passe</label>
                        <input type="password" id="password" name="password" placeholder="******" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" placeholder="luc.dupontdeligonnes@gmail.com" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="text" id="phone" name="phone" placeholder="06 44 23 57 09" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="postcode">Code postal</label>
                        <input type="text" id="postcode" name="postcode" placeholder="59000" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" id="ville" name="ville" placeholder="Lille" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" name="address" placeholder="18 rue de la Blanca" class="form-control">
                    </div>

                    <button class="btn btn-primary">Envoyer</button>
                    <a href="my_shop.php" class="btn btn-primary">Retour</a>
                </form>
            </section>
        </div>
    </main>
</body>
</html>