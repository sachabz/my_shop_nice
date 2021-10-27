<!DOCTYPE html>
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
        <?php
            include_once("connection.php");
            $reponse = $bdd->query('SELECT * FROM products');
        ?>
            <div class="container">
                <h1>Nos articles</h1>
                <div class="card-deck">
                <?php
                while ($donnees = $reponse->fetch()) {
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $donnees['name']; ?></h5>
                            <p class="card-text"><?php echo $donnees['price']; ?></p>
                            <p class="card-text"><?php echo $donnees['color']; ?></p>
                            <p class="card-text"><?php echo $donnees['size']; ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $donnees['Categorie']; ?></small></p>
                        </div>
                    </div>
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