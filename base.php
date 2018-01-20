<?php include('/includes/head.inc.php'); ?>
	<title>base de données</title>
	</head> 
	<?php include('/includes/menu.inc.php'); ?>

<h1>Base de données</h1> 
<h3>Musiciens commancants par une lettre</h3> 

<form method="get">
	Lettre: <input type="text" name="n" /><br />
	<input type="submit" value="Afficher (longue attente)" /><br /><br />
</form>

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

if (!empty($_GET["n"])) {
	$lettre = $_GET["n"];
	$requete = "Select Nom_Musicien, Prénom_Musicien, Code_Musicien, Photo from Musicien Where Nom_Musicien Like '$lettre%'";
	  $buffer = $pdo->query($requete);
	  // header("Content-Type: image/jpeg");
	  // header("Accept-Ranges: bytes");
	  // header('Content-Length: ' . sizeof($buffer));
	  // echo $buffer;
		// $buffer = base64_decode($buffer);
		// $image = imagecreatefromstring($im);


	foreach ($pdo->query($requete) as $row) {
		echo 'Nom : ' . $row['Nom_Musicien']. "<br>". 'Prenom : ' . $row[utf8_decode('Prénom_Musicien')]. "<br>". 'Code : '. $row['Code_Musicien']. "<br>" . $row['Photo']. "<br>". "<br>";
	}
	$pdo = null;

} else {
	echo "écrivez une lettre dans la case !";
}

// echo " <h3>Musiciens commancants par B</h3>" ;
//
// $requete = "Select Nom_Musicien from Musicien Where Nom_Musicien Like 'B%' ";
// foreach ($pdo->query($requete) as $row) {
// 	echo 'Nom : ' . $row['Nom_Musicien']. "<br>";
// }
// $pdo = null;

echo " </body>" ;
echo " </html>" ;
?>
