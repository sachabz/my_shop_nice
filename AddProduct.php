<?php 

$name=$_POST["name"];
$price=$_POST["price"];
$color =$_POST["color"];
$size =$_POST["size"];
$sexe=$_POST['sexe'];
$categorie=$_POST['categorie'];

include_once("connection.php");


    if(!empty($_POST)){

        if(
            isset($_POST["name"], $_POST["price"])
            && !empty($_POST["name"]) && !empty($_POST["price"])
        ){ 
       
        $sql = "INSERT INTO products(name, price, categorie, size, color, sexe) VALUES (:name, :price, :categorie, :size, :color, :sexe)";  

        $querry = $db->prepare($sql);

        $querry->bindValue(":name", $name, PDO::PARAM_STR);
        $querry->bindValue(":price", $price, PDO::PARAM_INT);
        $querry->bindValue(":categorie", $categorie, PDO::PARAM_STR);
        $querry->bindValue(":size", $size, PDO::PARAM_STR);
        $querry->bindValue(":color", $color, PDO::PARAM_STR);
        $querry->bindValue(":sexe", $sexe, PDO::PARAM_STR);
    
        if(!$querry->execute()){
             die("Une erreur est survenue");
        }
    
        $id = $db->lastInsertId();
            die("L'article $id a était ajouté au catalogue");

    }else{
            die("Le formulaire est imcomplet");
        }     

    }    
?>

 <h1> ADD Produits </h1>
 <form method="post" enctype="multipart/form-data">
    
     <div>
       <label for="titre">Nom de l'article</label><br>
       <input type="text" id="name" name="name" placeholder="le titre du produit"> <br><br>
     </div>
     
     <div>
       <label for="categorie">Catégorie</label><br>
         <select name="catégorie_id">
           <option value="manche courte">Manche courte</option>
           <option value="manche longue">Manche longue</option>
       </select><br><br>
     </div>

     <div>
       <label for="couleur">Couleur</label><br>
         <select name="color" id="color">
           <option value="bleu">Bleu</option>
           <option value="blanc">Blanc</option>
           <option value="rouge">Rouge</option>
           <option value="noir">Noir</option>
           <option value="gris">Gris</option>
         </select><br><br>
     </div>

     <div>
       <label for="taille">Taille</label><br>
         <select name="size" id="size">
           <option value="S">S</option>
           <option value="M">M</option>
           <option value="L">L</option>
           <option value="XL">XL</option>
         </select><br><br>
     </div>

     <div>
       <label for="sexe">Genre</label><br>
          <select name="sexe" id="sexe"> 
           <option value="Femme">Femme</option>
           <option value="Homme">Homme</option>
          </select><br><br> 
     </dib>

     <div> 
       <label for="prix">Prix</label><br>
       <input type="number" id="prix" name="price" value="0"><br><br>
     </div>
     
     <div>  
       <label for="photo">Photo</label><br>
       <input type="file" id="photo" name="photo"><br><br>
     </div>
      
     <input type="submit">
</div>
 </form>