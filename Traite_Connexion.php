<?php
    require('valide.php');
    include('includes/identifiants.php');
    include('/includes/head.inc.php'); ?>
<title>connexion</title>
</head> 
<body>
<nav>
<ul id="menu_horizontal">
<li class="bouton_gauche"><a href = "index.php"> Acceuil </a></li>
<li class="bouton_gauche"><a href = "apropos.php"> A propos </a></li>
<li class="bouton_gauche"><a href = "bd/baseIndex.php"> Contenu BD </a></li>
<li class="bouton_droite"><a href = "panier.php"> Mon panier </a></li>

<?php 
if (empty($_SESSION['Login'])) {
    echo "<li class=\"bouton_droite\"><a href = \"connexion.php\"> Connexion </a></li>";
} else echo "<li class=\"bouton_droite\"><a href = \"Deconnexion.php\"> Deconnexion </a></li>"; ?>

</ul>
</nav>
<?php

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