<?php 

$ID=$_POST["ID"];
$name=$_POST["name"];
$price=$_POST["price"];
$color =$_POST["color"];
$size =$_POST["size"];
$sexe=$_POST['sexe'];
$categorie=$_POST['categorie'];

include_once("connect.php");

    if(!empty($_POST)){

        if(
            isset($_POST["name"], $_POST["price"])
            && !empty($_POST["name"]) && !empty($_POST["price"])
        ){ 
       
        $sql = "INSERT INTO products(ID, name, price, categorie, size, color, sexe) VALUES (:ID, :name, :price, :categorie, :size, :color, :sexe)";  

        $querry = $db->prepare($sql);

        $querry->bindValue(":ID", $ID, PDO::PARAM_INT);
        $querry->bindValue(":name", $name, PDO::PARAM_STR);
        $querry->bindValue(":price", $price, PDO::PARAM_INT);
        $querry->bindValue(":categorie", $categorie, PDO::PARAM_STR);
        $querry->bindValue(":size", $size, PDO::PARAM_STR);
        $querry->bindValue(":color", $color, PDO::PARAM_STR);
        $querry->bindValue(":sexe", $sexe, PDO::PARAM_STR);
    
        if(!$querry->execute()){
             die("Une erreur est survenue");
        }
    
       $_SESSION['message'] = "Produit ajouté";
        require_once('close.php');

        header('Location: AdminProducts.php');

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
                <h1>Ajouter un produit</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="titre">Nom de l'article</label>
                        <input type="text" id="name" name="name" placeholder="le titre du produit" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="couleur">Couleur</label><br>
                        <select name="color" id="color" class="form-control">
                           <option value="bleu">Bleu</option>
                           <option value="blanc">Blanc</option>
                           <option value="rouge">Rouge</option>
                           <option value="noir">Noir</option>
                           <option value="gris">Gris</option>
                       </select>
                    </div>

                    <div class="form-group">
                        <label for="categorie">Catégorie</label><br>
                        <select name="categroie" id="categroie" class="form-control">
                           <option value="Manche courte">Manche courte</option>
                           <option value="Manche longue">Manche longue</option>
                       </select>
                    </div>



                    <div class="form-group">
                        <label for="taille">Taille</label><br>
                        <select name="size" id="size" class="form-control">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sexe">Genre</label><br>
                        <select name="sexe" id="sexe" class="form-control"> 
                           <option value="Femme">Femme</option>
                           <option value="Homme">Homme</option>
                        </select>   
                    </div>

                    <div class="form-group">
                        <label for="prix">Prix</label><br>
                        <input type="number" id="prix" name="price" value="0" class="form-control">
                    </div>

                    <div>  
                        <label for="photo">Photo</label><br>
                        <input type="file" id="photo" name="photo" class="form-control">
                    </div><br>
                    <button class="btn btn-primary">Envoyer</button>
                    <a href="AdminProducts.php" class="btn btn-primary">Retour</a>
                </form>
            </section>
        </div>
    </main>
</body>
</html>