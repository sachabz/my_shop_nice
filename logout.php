<?php 
if (isset($_GET['logout'])) {
    session_unset();
    setcookie('login');
   return header('location:index.php');
}
?>