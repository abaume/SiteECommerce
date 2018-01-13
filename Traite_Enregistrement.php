<?php
    require('valide.php');
// Paramètres de connexion
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique';
    $user = 'ETD';
    $password = 'ETD';
    // Chaîne de connexion (Windows)
    $pdodsn = "sqlsrv:Server=$host;Database=$nomDb";
    // Connexion PDO
    $pdo = new PDO($pdodsn, $user, $password);

    $PasswordUser = $_REQUEST["Password"];
    $LoginUser =$_REQUEST["Login"];
    $url=$_REQUEST["url"];


    $connexion->exec("INSERT INTO Abonné(Login,Password) VALUES('".$LoginUser."','".$PasswordUser."')");
