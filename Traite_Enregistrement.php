<?php
    require('valide.php');
    include('includes/identifiants.php');

    /* définition des variables récupérées dans le formulaire d'enregistrement */
    $PasswordUser = $_REQUEST['Password'];
    $LoginUser =$_REQUEST['Login'];
    $NomUser = $_REQUEST['Nom'];
    $PrenomUser = $_REQUEST['Prenom'];
    $AdresseUser = $_REQUEST['Adresse'];
    $VilleUser = $_REQUEST['Ville'];
    $CodePostalUser = $_REQUEST['CodePostal'];
    $NomPaysUser = $_REQUEST['Pays'];
    $EmailUser = $_REQUEST['Mail'];
    
    /* on récupère l'adresse précédente de celle du formulaire */
    $url= $_REQUEST['url'];

    /* définition des variables utilisées dans le code suivant */
    $mail_free = 1;
    $message = "";

    if (empty($PasswordUser) || empty($LoginUser)) { // vérifier que les deux champs obligatoires ne sont pas vides
        $message = "Veuillez renseigner un Pseudo ET un mot de passe s'il vous plait";
    }
    else {
        /* vérifier que le login entré est disponible */
        $rep=$pdo->query("SELECT COUNT(*) AS nb FROM Abonné WHERE Login = '$LoginUser'");
        $pseudo_free = ($rep->fetchColumn()==0)?1:0;

        /* vérifier que l'email entré (s'il y en a un) est disponible */
        if (!empty($EmailUser)) { 
            $repmail= $pdo->query("SELECT COUNT(*) AS nb FROM Abonné WHERE Email = '$EmailUser'");
            $mail_free = ($repmail->fetchColumn()==0)?1:0;
            }
        }
    
        /* afficher des messages */
        if(!$pseudo_free) {$message = "Votre pseudo est déjà utilisé par un membre ";} 
        if(!$mail_free) {$message = "Votre adresse mail est déjà utilisée par un membre";}
                   
        /* si le mail et le pseudo sont libres, exécuter l'insertion dans la base */
        if ($mail_free && $pseudo_free) {
            
            /* récuperer le code pays à partir du nom saisi pour pouvoir l'insérer dans la table abonné */
            $recuperation_pays = $pdo->query("select Pays.Code_Pays from Pays Where Nom_Pays = '" . $NomPaysUser ."'; ");
            $PaysUser = $recuperation_pays->fetch();

            /* insertion dans la base */
            $req = 'INSERT INTO Abonné(Nom_Abonné, Prénom_Abonné, Login, Password, Adresse, Code_Postal, Ville, Code_Pays, Email) 
                    VALUES(\'' . $NomUser . '\', \'' .$PrenomUser. '\', \'' . $LoginUser . '\', \'' . $PasswordUser . '\', \'' . $AdresseUser . '\', \'' 
                    . $CodePostalUser . '\', \'' . $VilleUser . '\','  . $PaysUser['Code_Pays'] . ', \'' . $EmailUser . '\')';
            $pdo->query($req);

            /* la variable de session Login prend $LoginUser */
            $_SESSION['Login'] = $LoginUser;

            /* on affiche un message disant que tout s'est bien passé */
            $message = '<a href="connexion.php">Vous avez bien été enregistré, bravo ! Pour vous connecter, cliquez ici</a> ';
        }       
    
    echo "<center>" . $message . "<br> Pour revenir à la page précédente, <a href = \"enregistrement.php\">cliquez ici</a></center>";
