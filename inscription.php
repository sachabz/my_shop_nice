<?php 

$firstname=$_POST["firstname"];   
$name=$_POST["name"];
$password=$_POST["password"];
$email =$_POST["email"];
$postcode =$_POST["postcode"];
$ville=$_POST["ville"]
$address =$_POST["address"];
$phone=$_POST["phone"];


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
            isset($_POST["name"], $_POST["password"])
            && !empty($_POST["name"]) && !empty($_POST["password"])
        ){ 
       
        $sql = "INSERT INTO users(firstname, name, password, email, postcode, address, phone) VALUES (:firstname, :name, :password, :email, :postcode, :address, :phone)";  

        $querry = $db->prepare($sql);

        $querry->bindValue(":firstname", $firstname, PDO::PARAM_STR);
        $querry->bindValue(":name", $name, PDO::PARAM_STR);
        $querry->bindValue(":password", $password);
        $querry->bindValue(":email", $email, PDO::PARAM_STR);
        $querry->bindValue(":postcode", $postcode, PDO::PARAM_INT);
        $querry->bindValue(":ville", $ville, PDO::PARAM_STR);
        $querry->bindValue(":address", $address);
        $querry->bindValue(":phone", $phone, PDO::PARAM_INT);

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
       <label for="firstname">Votre prénom:</label><br>
       <input type="text" id="firstname" name="firstname" placeholder=" Emmanuel"> <br><br>
     </div>
     
     <div>
       <label for="name">Votre om:n</label><br>
       <input type="text" id="name" name="name" placeholder="Macron"> <br><br>
     </div>
     
     <div>
       <label for="password">Votre mots de passe:</label><br>
       <input type="password" id="password" name="password" placeholder="*******"> <br><br>
     </div>
       
     <div>
       <label for="password_confirmation">Confirmer votre mots de passe:</label><br>
       <input type="password" id="password_confirmation" name="password_confirmation" placeholder="*******"> <br><br>
     </div>  
      
    <div>
      <label for="email">Votre email:</label><br>
      <input type="text" id="email" name="email" placeholder="emmanuel.macron@gmail.com"> <br><br>
     </div>
     
     <div>
       <label for="postcode">Votre code postal:</label><br>
       <input type="text" id="postcode" name="postcode" placeholder="75000"> <br><br>
     </div>
    
     <div>
       <label for="ville">Votre code postal:</label><br>
       <input type="text" id="ville" name="ville" placeholder="Paris"> <br><br>
     </div>
     <div>
       <label for="address">Votre adresse</label><br>
       <input type="text" id="address" name="address" placeholder="55 Rue du Faubourg Saint-Honoré"> <br><br>
     </div>

     <div>
       <label for="phone">Votre numéro de téléphone:</label><br>
       <input type="text" id="phone" name="phone" placeholder="01 42 92 81 00"> <br><br>
     </div>

     <input type="submit">
</div>
 </form>