<?php
    require('/functions/valide.php');
    include('includes/identifiants.php');
    include('/includes/head.inc.php'); ?>
<title>connexion</title>
</head> 
<?php
session_start();
include('/includes/menu.inc.php'); 

    $message='';
    $url = $_REQUEST['url'];


    if (empty($_REQUEST['Login']) || empty($_REQUEST['Password']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    } else {

    $login = $_REQUEST['Login'];
    $rep = $pdo->prepare('SELECT * FROM Abonné WHERE Login= :log');
    $rep->execute(array(
        'log' => $login));
    $data = $rep->fetch();

        if ($data['Password'] == $_REQUEST['Password']) {
            if (isset($_REQUEST['souvenir'])) {
                $expire = time() + 365*24*3600;
                setcookie('Login', $_SESSION['Login'], $expire);
            }
            session_start();
            $_SESSION['Login'] = $data['Login'];
            $message = '<p>Bienvenue '.$data['Login'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="' . $url . '">ici</a> 
			pour revenir à la page précédente</p>';  
        } else {
            $message = '<p>Une erreur s\'est produite 
            pendant votre identification.<br /> Le mot de passe ou le pseudo 
                entré n\'est pas correct.</p><p>Cliquez <a href="'. $url . '">ici</a> 
            pour revenir à la page précédente';
        }
        $rep->CloseCursor();
    }
    echo $message.'</div></body></html>';
?>
</body>
</html>