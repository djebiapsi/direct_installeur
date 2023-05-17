<?php

// Définir les paramètres de connexion de manière sécurisée
$host = "localhost";
$login = "root";
$pass = "";
$dbname = "direct_installateur";

// Créer la connexion avec la base de données en utilisant MySQLi
$bdd = new mysqli($host, $login, $pass, $dbname);

// Vérifier si la connexion a réussi
if ($bdd->connect_error) {
    die("Erreur de connexion à la base de données : " . $bdd->connect_error);
}

// ...
// Votre code continue ici
// ...

?>
