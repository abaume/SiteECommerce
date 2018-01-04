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
<h3>Instruments</h3> 

<p>
	
<?php
// Paramètres de connexion
$host = 'INFO-SIMPLET';
$nomDb = 'Classique';
$user = 'ETD';
$password = 'ETD';
// Chaîne de connexion (Windows)
$pdodsn = "sqlsrv:Server=$host;Database=$nomDb";
// // Chaîne de connexion (Linux)
// $pdodsn = "dblib:version=7.0;charset=UTF-8;host=$host;dbname=$nomDb";
// Connexion PDO
$pdo = new PDO($pdodsn, $user, $password);

	$lettre = $_GET["n"];
	$requete = "Select Distinct Nom_Musicien, Prénom_Musicien, Nom_Instrument, Instrument.photo from Musicien Inner Join Instrument On Instrument.Code_Instrument = Musicien.Code_Instrument Group By Nom_Insrument";
	  $buffer = $pdo->query($requete);

	foreach ($pdo->query($requete) as $row) {
		echo 'Nom : ' . $row['Nom_Musicien']. "<br>". 'Prenom : ' . $row[utf8_decode('Prénom_Musicien')]. "<br>". "<br>". "<br>"; //nom instrument image
	}
	$pdo = null;

// else {
//	echo "écrivez une lettre dans la case !";
//}
?>
</p>
</div>
</body>
</html>
