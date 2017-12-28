<?php include('/includes/head.inc.php'); ?>
	<title>baseinsertion</title>
	</head> 
	<?php include('/includes/menu.inc.php'); ?>

<h1>Base de données (insertion)</h1>
<h3>Insérer</h3>

<form method="get">
	Nom_Abonné: <input type="text" name="nom" /><br />
	Prénom_Abonné: <input type="text" name="prenom" /><br />
	Login: <input type="text" name="log" /><br />
	Password: <input type="text" name="pass" /><br />
	<input type="submit" value="Insérer" /><br /><br />
</form>

<?php
// Connexion odbc
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


	$dbh = new PDO($pdodsn, $user, $password);
	$query = "INSERT INTO Abonné (Nom_Abonné, Prénom_Abonné, Login, Password) VALUES (:nom,:prenom,:log,:pass)";
	$stmt = $dbh->prepare($query);

	if (!empty($_GET["nom"]) && !empty($_GET["prenom"])) {
		$stmt->execute(array(':nom' => $_GET["nom"],
		':prenom' => $_GET["prenom"],
		':log' => $_GET["log"],
		':pass' =>$_GET["pass"]));

	$rqt = new PDO($pdodsn, $user, $password);

	$requete = "Select Nom_Abonné, Prénom_Abonné from Abonné ORDER BY Nom_Abonné";
	foreach ($rqt->query($requete) as $row) {
		echo 'Nom : ' . $row[utf8_decode('Nom_Abonné')]. ' Prénom : '. $row[utf8_decode('Prénom_Abonné')]. "<br>";
	}
}
?>
</body>
</html>

