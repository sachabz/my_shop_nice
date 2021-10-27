<?php
include_once("connexion.php");


class AddUser extends Connexion {

    public function setUser($firstname, $name, $password, $email, $postcode, $address, $phone) {
        try {
            $conn = $this->connect_db();
            $sql = "INSERT INTO users (firstname, name, password, email, postcode, address, phone) VALUES ('$firstname', '$name', '$password', '$email', '$postcode', '$address', '$phone')";
            $conn->exec($sql);
            echo "Inscription validated!";
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}