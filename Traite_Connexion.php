<?php
    require('valide.php');
// Paramètres de connexion
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique_Web';
    $user = 'ETD';
    $password = 'ETD';
    // Chaîne de connexion (Windows)
    $pdodsn = "sqlsrv:Server=$host;Database=$nomDb";
    // Connexion PDO
    $pdo = new PDO($pdodsn, $user, $password);
    
    // récupération de l'url de la page
    $url=$_REQUEST["url"];

    // // Validation des paramètres
    // if(!isValid($PasswordUser))
    // 	header("Location: Connexion.php?url=".$url);
    // if(!isValid($LoginUser))
    //     header("Location: Connexion.php?url=".$url);
        
    $message='';
    if (empty($_REQUEST['Login']) || empty($_REQUEST['Password']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    } else {
       $log = $_REQUEST['Login'];
       $rep = $pdo->query("SELECT * FROM Abonné WHERE Login= '$log' ") or die(print_r($pdo->errorInfo()));
       $data=$rep->fetch();

        // echo "Login data :" . $data['Login'] . " Login request : ". $_REQUEST['Login'];
        // echo "Password data :" . $data['Password'] . " Password request : ". $_REQUEST['Password'];

        if ($data['Password'] == $_REQUEST['Password']) {
            $_SESSION['Login'] = $data['Login'];
            $message = '<p>Bienvenue '.$data['Login'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="./index.php">ici</a> 
			pour revenir à la page d accueil</p>';  
        } else {
            $message = '<p>Une erreur s\'est produite 
            pendant votre identification.<br /> Le mot de passe ou le pseudo 
                entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a> 
            pour revenir à la page précédente
            <br /><br />Cliquez <a href="./index.php">ici</a> 
            pour revenir à la page d accueil</p>';
        }
        $rep->CloseCursor();
    }
    echo $message.'</div></body></html>';
?>