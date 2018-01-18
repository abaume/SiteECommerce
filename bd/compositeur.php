<?php include('../includes/headBD.inc.php'); ?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>base de données</title>
  </head><?php include('../includes/menuBD.inc.php'); ?>
  <body>

<h1>Base de données</h1> 
<?php include('../includes/navbarBD.inc.php'); ?>
<div style="margin-left:25%">
<h3>Compositeurs commancants par la/les lettre(s)...</h3> 

<form method="get">
	Lettre(s): <input type="text" name="n" /><br />
	<input type="submit" value="Afficher (longue attente)" /><br /><br />
</form>

<?php
// Paramètres de connexion
$host = 'INFO-SIMPLET';
$nomDb = 'Classique_Web';
$user = 'ETD';
$password = 'ETD';
// Chaîne de connexion (Windows)
$pdodsn = "sqlsrv:Server=$host;Database=$nomDb";
// // Chaîne de connexion (Linux)
// $pdodsn = "dblib:version=7.0;charset=UTF-8;host=$host;dbname=$nomDb";
// Connexion PDO
$pdo = new PDO($pdodsn, $user, $password);

if (!empty($_GET["n"])) {
	$lettre = $_GET["n"];
	$requete = "Select Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien from Musicien Inner Join Composer On Composer.Code_Musicien = Musicien.Code_Musicien Where Nom_Musicien Like '$lettre%' Group By Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien Order By Musicien.Nom_Musicien, Musicien.Prénom_Musicien";
	  $buffer = $pdo->query($requete);

	foreach ($pdo->query($requete) as $row) {
		echo 'Nom : '. "<a href=\"musicien.php?fonction=compositeur&code=" . $row['Code_Musicien']. "\">" . $row['Nom_Musicien']. "</a><br>". 'Prenom : ' . $row[utf8_decode('Prénom_Musicien')]. "<br>". 'Code : '. $row['Code_Musicien']. "<br><br><br>";
	}
	$pdo = null;

} else {
	echo "écrivez une lettre dans la case !";
}
?>
</div>
</body>
</html>
