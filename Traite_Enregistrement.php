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

    $i = 0;
    $pseudo_erreur1 = NULL;
    $pseudo_erreur2 = NULL;
    $mdp_erreur = NULL;
    $email_erreur1 = NULL;
    $email_erreur2 = NULL;
    $message = "";

    if (empty($PasswordUser) || empty($LoginUser)) {
        $message = "Veuillez renseigner un Pseudo ET un mot de passe s'il vous plait";
    }
    else {
        $rep=$pdo->query("SELECT COUNT(*) AS nb FROM Abonné WHERE Login = '$LoginUser'");
        $pseudo_free = ($rep->fetchColumn()==0)?1:0;
        $rep->CloseCursor();
    
        if(!$pseudo_free) {
            $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
            $i++;
        } else {
            $insertion = $pdo->query("INSERT INTO Abonné(Login,Password) VALUES('".$LoginUser."','".$PasswordUser."')");
            $_SESSION['Login'] = $LoginUser;
            $message = "Vous avez bien été enregistré, bravo !";
        }       
    }

    echo $message;
