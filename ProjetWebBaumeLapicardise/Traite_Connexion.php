<?php
// Paramètres de connexion
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique';
    $user = 'ETD';
    $password = 'ETD';
    // Chaîne de connexion (Windows)
    $pdodsn = "sqlsrv:Server=$host;Database=$nomDb";
    // Connexion PDO
    $pdo = new PDO($pdodsn, $user, $password);
    $requete = "Select Nom_Musicien from Musicien Where Nom_Musicien Like 'Ba%' ";
    foreach ($pdo->query($requete) as $row) {
        echo 'Nom : ' . $row['Nom_Musicien']. "<br>";
    }
    $pdo = null;