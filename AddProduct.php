<?php 

$name=$_POST["name"];
$price=$_POST["price"];
$color =$_POST["color"];
$size =$_POST["size"];

define("DBHOST", "localhost");
define("DBUSER", "admin"); 
define("DBPASS", "arthur");
define("DBNAME", "my_shop");

$dns = "mysql:dbname=".DBNAME.";host=".DBHOST;

try{
    $db = new PDO($dns, DBUSER, DBPASS);

    echo "On est connectés";

}catch(PDOException $e){
    die("Erreur:".$e->getMessage());
}


    if(!empty($_POST)){

        if(
            isset($_POST["name"], $_POST["price"])
            && !empty($_POST["name"]) && !empty($_POST["price"])
        ){ 
       
        $sql = "INSERT INTO products(name, price, size, color) VALUES (:name, :price, :size, :color)";  

        $querry = $db->prepare($sql);

        $querry->bindValue(":name", $name, PDO::PARAM_STR);
        $querry->bindValue(":price", $price, PDO::PARAM_INT);
        $querry->bindValue(":size", $size, PDO::PARAM_STR);
        $querry->bindValue(":color", $color, PDO::PARAM_STR);
    
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
           <option value="manche_courte">Manche Courte</option>
           <option value="manche_longue">Manche Longue</option>
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
       <label for="public">Public</label><br>
         <input type="radio" name="public" value="m" checked>Homme
         <input type="radio" name="public" value="f">Femme<br><br>
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