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

<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
  <title>Espace sécurisée</title>
</head>

<h1><a href = "index.php"> Accueil </a></h1></br>
<body>
  <h1>Bienvenue dans votre espace sécurisée</h1>
</body>
</html>
