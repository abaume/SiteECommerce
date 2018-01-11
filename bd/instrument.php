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
$nomDb = 'Classique_Web';
$user = 'ETD';
$password = 'ETD';
// Chaîne de connexion (Windows)
$pdodsn = "sqlsrv:Server=$host;Database=$nomDb";
// // Chaîne de connexion (Linux)
// $pdodsn = "dblib:version=7.0;charset=UTF-8;host=$host;dbname=$nomDb";
// Connexion PDO
$pdo = new PDO($pdodsn, $user, $password);

	$requete1 = "Select Instrument.Nom_Instrument from Instrument";
	$buffer = $pdo->query($requete1);	

	foreach ($pdo->query($requete1) as $row) {
		echo "<h3>". $row['Nom_Instrument']. "</h3>";
		$instru = $row['Nom_Instrument'];
		$requete2 = "Select Nom_Musicien, Prénom_Musicien, Code_Musicien from Musicien Inner Join Instrument On Instrument.Code_Instrument = Musicien.Code_Instrument Where Instrument.Nom_Instrument Like '$instru' Group By Nom_Musicien, Prénom_Musicien, Code_Musicien";
		$buffer = $pdo->query($requete2);
		foreach ($pdo->query($requete2) as $row) {
			echo "<a href=\"musicien.php?fonction=interprete&code=" . $row['Code_Musicien']. "\">" .$row['Nom_Musicien']. " " . $row[utf8_decode('Prénom_Musicien')]. "</a><br>";
		}
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
