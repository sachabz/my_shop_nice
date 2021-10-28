<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" />
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['name'])){
	$name = stripslashes($_REQUEST['name']);
	$name = mysqli_real_escape_string($conn, $name);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE name='$name' and password='$password'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['name'] = $name;
	    header("Location: index.php");
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>
<form class="box" action="./my_shop.php" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="name" placeholder="Nom">

<input type="password" class="box-input" name="password" placeholder="Mot de passe">



<input type="submit" value="Connexion " name="submit" class="box-button" >
<p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>


<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>