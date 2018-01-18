<?php
    require('valide.php');
    require('functions/erreur.php');
    require('functions/constant.php');
    include('includes/identifiants.php');

    $message = "";

    if (!empty($_REQUEST['Password'])) {
        $PasswordUser = $_REQUEST['Password'];
    } else erreur(ERR_PASSWORD_NULL);
    if (!empty($_REQUEST['Login'])) {
        $LoginUser =$_REQUEST['Login'];
    }  else erreur(ERR_PSEUDO_NULL);
    if (!empty($_REQUEST['Nom'])) {
    $NomUser = $_REQUEST['Nom'];
    } else $NomUser = "";
    if (!empty($_REQUEST['Prenom'])) {
    $PrenomUser = $_REQUEST['Prenom'];
    } else $PrenomUser = "";
    if (!empty($_REQUEST['Adresse'])) {
    $AdresseUser = $_REQUEST['Adresse'];
    } else $AdresseUser = "";
    if (!empty($_REQUEST['Ville'])) {
    $VilleUser = $_REQUEST['Ville'];
    } else $VilleUser = "";
    if (!empty($_REQUEST['CodePostal'])) {
    $CodePostalUser = $_REQUEST['CodePostal'];
    } else $CodePostalUser = "";
    if (!empty($_REQUEST['Pays'])) {
    $NomPaysUser = $_REQUEST['Pays'];
    } else $NomPaysUser = "";
    if (!empty($_REQUEST['Mail'])) {
    $EmailUser = $_REQUEST['Mail'];
    } else $NomPaysUser = "";
    
    $url= $_REQUEST['url'];
    $mail_free = 1;
    $pseudo_free = 1;
    $i = 0;


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
            $message = 'Vous avez bien été enregistré, bravo ! Pour vous connecter, cliquez <a href="connexion.php">ici</a> ';
        }       
    
    echo $message;
