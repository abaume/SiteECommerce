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
<h3>Album - détails</h3> 

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

if (!empty($_GET["code"])) {
	$code = $_GET["code"];
	
	$requete = "Select Album.Titre_Album, Album.Code_Album From Album Where Album.Code_Album like '$code'";
	$buffer = $pdo->query($requete);
	foreach ($pdo->query($requete) as $row) {
		echo 
		"<h3>". $row['Titre_Album'] . "</h3>" . "<br>" .
		"<img src=\"/Classique/Home/Pochette/" . $row['Code_Album'] . "\" alt=\"Photo\" width=\"100\">";
	}
	echo "<h3> Morceaux </h3>";
	
    $requete = "Select Distinct Disque.Code_Disque, Album.ASIN, Enregistrement.Titre, Enregistrement.Durée, Enregistrement.Code_Morceau from Album
	Inner Join Disque On Disque.Code_Album = Album.Code_Album
	Inner Join Composition_Disque On Disque.Code_Disque = Composition_Disque.Code_Disque 
	Inner Join Enregistrement On Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
	Where Album.Code_Album like '$code'";	
	$buffer = $pdo->query($requete);	
	foreach ($pdo->query($requete) as $row) {
		echo 
		"<h4>". $row['Titre'] . "</h4>" .
		"<p><audio src=\"/Classique/Home/Extrait/" . $row['Code_Morceau'] . "\" controls></audio>" .
		"(" . $row[utf8_decode('Durée')] . ")" .
		"<span class=\"btn\"><input type=\"submit\" value=\"Ajouter\" name=\"ajout\" class=" .
		$row['Code_Morceau'] . "</span></p>";
	}
	}
	if (!empty($_GET["ajout"])) {
		$ajout = $_GET["ajout"];
		echo "Ajout...";

		$requete = "SELECT Code_Achat, Code_Enregistrement, Code_Abonné FROM Achat
		INNER JOIN Composition_Disque On Composition_Disque.Code_Morceau = Achat.Code_Enregistrement
		INNER JOIN Disque On Disque.Code_Disque = Composition_Disque.Code_Disque
		INNER JOIN Album ON Disque.Code_Album = Album.Code_Album
		INNER JOIN Abonné ON Abonné.Code_Abonné = Achat.Code_Abonné ";
		  $buffer = $pdo->query($requete);
		  foreach ($pdo->query($requete) as $row) {
			  $requete = "INSERT INTO Achat(Code_Achat, Code_Enregistrement, Code_Abonné) 
			  VALUES(\'' . $Code_Achat . '\', \'' . $Code_Enregistrement . '\', \'' . $Code_Abonné . '\') ";
		  }
		echo "Ajouté au panier !";
	$pdo = null;
}
?>
</p>
</div>
</body>
</html>
