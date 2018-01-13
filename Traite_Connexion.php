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
      //  $requete = ; /*and Password =':password'*/
        $response = $pdo->prepare("Select Login, Password FROM Abonné WHERE Login like ':login'") or die(print_r($pdo->errorInfo()));
        $response->bindValue(':login', $_REQUEST['Login'], PDO::PARAM_STR);
        $response->execute();
      //  $response->execute(array('login' => $_REQUEST['Login'])); /*, 'password' => $_REQUEST['Password']*/
        $data = $response->fetch();

        echo $data['Login'] . "  ". $_REQUEST['Login'];
        echo $data['Password'] . "  ". $_REQUEST['Password'];

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
        $response->CloseCursor();
    }
    echo $message.'</div></body></html>';
?>