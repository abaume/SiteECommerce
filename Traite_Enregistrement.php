<?php
    require('valide.php');
    include('includes/identifiants.php');

    $PasswordUser = $_REQUEST['Password'];
    $LoginUser =$_REQUEST['Login'];
    $NomUser = $_REQUEST['Nom'];
    $PrenomUser = $_REQUEST['Prenom'];
    $AdresseUser = $_REQUEST['Adresse'];
    $VilleUser = $_REQUEST['Ville'];
    $CodePostalUser = $_REQUEST['CodePostal'];
    $NomPaysUser = $_REQUEST['Pays'];
    $EmailUser = $_REQUEST['Mail'];
    
    $url= $_REQUEST['url'];

    $i = 0;
    $pseudo_erreur = NULL;
    $mdp_erreur = NULL;
    $mail_free = 1;
    $message = "";

    if (empty($PasswordUser) || empty($LoginUser)) {
        $message = "Veuillez renseigner un Pseudo ET un mot de passe s'il vous plait";
    }
    else {
        $rep=$pdo->query("SELECT COUNT(*) AS nb FROM Abonné WHERE Login = '$LoginUser'");
        $pseudo_free = ($rep->fetchColumn()==0)?1:0;

        if (!empty($EmailUser)) { // traiter email
            $repmail= $pdo->query("SELECT COUNT(*) AS nb FROM Abonné WHERE Email = '$EmailUser'");
            $mail_free = ($repmail->fetchColumn()==0)?1:0;
            }
        }
    
        if(!$pseudo_free) {
            $message = "Votre pseudo est déjà utilisé par un membre ";
            $i++;
        } 

        if(!$mail_free) { 
            $message += "Votre adresse mail est déjà utilisée par un membre";
        }
                   
        if ($mail_free && $pseudo_free) {
            
            $test = $pdo->query("select Pays.Code_Pays from Pays Where Nom_Pays = '" . $NomPaysUser ."'; ");
            $PaysUser = $test->fetch();

            $req = 'INSERT INTO Abonné(Nom_Abonné, Prénom_Abonné, Login, Password, Adresse, Code_Postal, Ville, Code_Pays, Email) 
                    VALUES(\'' . $NomUser . '\', \'' .$PrenomUser. '\', \'' . $LoginUser . '\', \'' . $PasswordUser . '\', \'' . $AdresseUser . '\', \'' 
                    . $CodePostalUser . '\', \'' . $VilleUser . '\','  . $PaysUser['Code_Pays'] . ', \'' . $EmailUser . '\')';
            $pdo->query($req);
            $_SESSION['Login'] = $LoginUser;
            $message = '<a href="connexion.php">Vous avez bien été enregistré, bravo ! Pour vous connecter, cliquez ici</a> ';
        }       
    
    echo "<center>" . $message . "<br> Pour revenir à la page précédente, <a href = \"enregistrement.php\">cliquez ici</a></center>";
