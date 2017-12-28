<?php
session_start();
if (isset($_SESSION["NOM_USER"]))
{
	echo "Bonjour ".$_SESSION["NOM_USER"];
}
else
{
	$url = $_SERVER["REQUEST_URI"];
	header("Location: connexion.php?url=".$url);
}
?>

<?php include('/includes/head.inc.php'); ?>
<title>session</title>
</head> 
<?php include('/includes/menu.inc.php'); ?>
<h1>Bienvenue dans votre espace sécurisée</h1>
</body>
</html>