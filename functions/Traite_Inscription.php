<?php
    $Password = $_POST["password"];
    $Login=$_POST["pseudo"];
    // Paramètres de connexion
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique';
    $user = 'ETD';
    $password = 'ETD';
    // Chaîne de connexion (Windows)
    $pdodsn = "sqlsrv:Server=$host;Database=$nomDb";
    // Chaîne de connexion (Linux)
    $pdodsn = "dblib:version=7.0;charset=UTF-8;host=$host;dbname=$nomDb";
    // Connexion PDO
    $pdo = new PDO($pdodsn, $user, $password);
    $requete = "Insert into Abonné (Login, Password) values ($Login, $Password)";
    $requete_test = "Select * from Abonné where Login ='".$Login."' and Password ='".$Password."'";
    foreach ($pdo->query($requete_test) as $row) {
        echo 'Nom : ' . $row['Login']. "<br>";
    }
    $pdo = null;
?> 