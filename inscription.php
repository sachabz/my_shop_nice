<?php 

define("DBHOST", "localhost:3306");
define("DBUSER", "admin"); 
define("DBPASS", "arthur");
define("DBNAME", "my_shop");

$dns = "mysql:dbname=".DBNAME.";host=".DBHOST;

try{
    $db = new PDO($dns, DBUSER, DBPASS);

    $db->exec("SET NAMES utf8");

    echo "On est connectés";

}catch(PDOException $e){
    die("Erreur:".$e->getMessage());
}

if(!empty($_POST)){

        if(
            isset($_POST["name"], $_POST["password"])
            && !empty($_POST["name"]) && !empty($_POST["password"])
        ){ 
            
            $sql = "INSERT INTO users (firstname, name, password, email, postcode, address, phone) VALUES ('$firstname', :name, :password, :email, :postcode, :address, :phone)";       

            $querry = $db->prepare($sql);
           
            $querry->bindValue(":firstname", $firstname, PDO::PARAM_STR);
            $querry->bindValue(":name", $name, PDO::PARAM_STR);
            $querry->bindValue(":password", $password);
            $querry->bindValue(":email", $email);
            $querry->bindValue(":postcode", $password, PDO::PARAM_INT);
            $querry->bindValue(":address", $address);
            $querry->bindValue(":phone", $phone, PDO::PARAM_INT);

            if(!$querry->execute()){
             die("Une erreur est survenue");
             }

         }else{
            die("Le formulaire est imcomplet");
         }  
}
    ?>

<!DOCTYPE html>
<HTML>
<head>
    <title>Inscription</title>
</head>
<body>

<form method="post" name="Inscription" id="form" class="form_input">
    

    <!-- FirstName -->
    <label for="firstname"> Prénom :</label></br>
    <input type="text" name="firstname" id="firstname" placeholder="Jim" required><br><br>
    

    <!-- Name -->
    <label for="lastname"> Nom :</label></br>
    <input type="text" name="name" placeholder="Jim" id="name" required><br><br>
   

    <!-- Email -->
    <label for="email"> Email :</label></br>
    <input type="text" name="email" placeholder="Jim@hgmail.com" id=email required><br><br>
 

    <!-- Password -->
    <label for="password"> Mots de passe :</label></br>
    <input type="password" name="password" placeholder="*****" id=password required><br><br>
   

    <!-- Confirmation -->
    <label for="password_confirmation"> Confirmer le mots de passe :</label></br>
    <input type="password" name="password_confirmation" placeholder="*****" id=password_confirmation required><br><br>
    

    <!-- Postcode -->
    <label for="postcode"> Code postal</label></br>
    <input type="text" name="postcode" pattern="[0-9]{5}" placeholder="59000" id=postcode required><br><br>
    

    <!-- Address -->
    <label for="address"> L'adresse</label></br>
    <input type="text" name="address" placeholder="Place rihour" id="address"required><br><br>
    

    <!-- Phone -->
    <label for="Phone"> Le numéro de téléphone</label></br>
    <input type="tel" name="phone" placeholder="0606060606" id="phone"required><br><br>
</form>

<!-- Submit -->
<button type="submit" name="submit" form="form" value="submit" class="button">Submit</button>

<p>If you already have an account, <a href="login.php">Log in here</a></p>

</body>
</HTML>