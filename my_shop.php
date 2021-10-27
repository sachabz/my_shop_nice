<?php
            //connexion BDD
            define("DBHOST", "localhost:3306");
            define("DBUSER", "admin"); 
            define("DBPASS", "sacha");
            define("DBNAME", "my_shop");
            
            $dns = "mysql:dbname=".DBNAME.";host=".DBHOST;
            
            try{
                $db = new PDO($dns, DBUSER, DBPASS);
            
                $db->exec("SET NAMES utf8");
            
                echo "On est connecté";
            
            }catch(PDOException $e){
                die("Erreur:".$e->getMessage());
            }
            //ALL products
            $query = "SELECT * FROM products";
            $result = $bdd->query($query);
        ?>

<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- FontAwesome Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- CSS Links -->
        <link rel="stylesheet" type="text/css" href="footer.css">
        <link rel="stylesheet" type="text/css" href="index.css">

        <!-- CSS Fonts Links -->
        <link rel="stylesheet" type="text/css" href="../Fonts/fonts.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

        <title>My shop footer</title>

    </head>


    <body>
        <div class="product">
            <div class="container">
                <div class="row">
                    <?php
                   echo "hell";?>
                   <?php
                        while ($donnees = $result->fetch()) {
                            echo "hello";
                        ?>
                        
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="card">
                            <div class="card-body">
                            <h5 class="card-title"><?php print_r($donnees['name']); ?></h5>
                            <p class="card-text"><?php print_r($donnees['price']); ?></p>
                            <p class="card-text"><?php print_r($donnees['color']); ?></p>
                            <p class="card-text"><?php print_r($donnees['size']); ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $donnees['Categorie']; ?></small></p>
                        </div>
                            </div>
                        </div>
            
                        <?php
                        }
                    ?>
            
                </div>
            </div>
                
            <footer>
                <?php include_once("footer.html");
                ?>
            </footer>
                
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    </body>
</html>