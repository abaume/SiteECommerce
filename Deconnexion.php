<?php include('/includes/head.inc.php'); ?>
<title>deconnexion</title>
</head> 
<?php include('/includes/menu.inc.php'); 

if (isset ($_COOKIE['Login'])) {
    setcookie('Login', '', -1);
}

session_destroy();
$titre="Déconnexion";

// if ($id==0) erreur(ERR_IS_NOT_CO);

echo '<p>Vous êtes à présent déconnecté <br />
Cliquez <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">ici</a> 
pour revenir à la page précédente.<br />
Cliquez <a href="./index.php">ici</a> pour revenir à la page principale</p>';
echo '</div></body></html>';
?>
