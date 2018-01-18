<?php
    require('valide.php');
    include('includes/identifiants.php');

    $PasswordUser = $_REQUEST['Password'];
    $LoginUser =$_REQUEST['Login'];
    $NomUser = $_REQUEST['Nom'];
    $EmailUser = $_REQUEST['mail'];
    
    $url= $_REQUEST['url'];

    $i = 0;
    $pseudo_erreur = NULL;
    $mdp_erreur = NULL;
    $message = "";

    if (empty($PasswordUser) || empty($LoginUser)) {
        $message = "Veuillez renseigner un Pseudo ET un mot de passe s'il vous plait";
    }
    else {
        $rep=$pdo->query("SELECT COUNT(*) AS nb FROM Abonné WHERE Login = '$LoginUser'");
        $pseudo_free = ($rep->fetchColumn()==0)?1:0;
        if (!empty($EmailUser)) {
            $repmail= $pdo->query("SELECT COUNT(*) AS nb FROM Abonné WHERE Email = '$EmailUser'");
            $mail_free = ($repmail->fetchColumn()==0)?1:0;
        }
    
        if(!$pseudo_free) {
            $message = $pseudo_erreur = "Votre pseudo est déjà utilisé par un membre";
            $i++;
        } else {
            $pdo->query('INSERT INTO Abonné(Nom_Abonné, Login, Password) VALUES(\'' . $NomUser . '\', \'' . $LoginUser . '\', \'' . $PasswordUser . '\');');
            $_SESSION['Login'] = $LoginUser;
            $message = 'Vous avez bien été enregistré, bravo ! Pour revenir à la page précédente, cliquez <a href="' . $url . '">ici</a> ';
        }       
    }  
    echo $message;
