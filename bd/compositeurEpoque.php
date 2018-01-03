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
<h3>Compositeurs de l'époque ...</h3> 

<form method="get">
<p>
<div class="btn-group">
	<input type="submit" value="Antiquité" name="epoque" class="bt"/>
	<input type="submit" value="Moyen-Age" name="epoque" class="bt"/>
	<input type="submit" value="16ème siècle" name="epoque" class="bt"/>
	<input type="submit" value="17ème siècle" name="epoque" class="bt"/>
	<input type="submit" value="18ème siècle" name="epoque" class="bt"/>
	<input type="submit" value="19ème siècle" name="epoque" class="bt"/>
	<input type="submit" value="20ème siècle" name="epoque" class="bt"/>
	<input type="submit" value="21ème siècle" name="epoque" class="bt"/>
</div>
</p>
<br /><br />
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

$$Date_Max;
$$Date_Min;

if (!empty($_GET["epoque"])) {
	$epoque = $_GET["epoque"];	
	switch (epoque){
	case Antiquité:
	$Date_Min = -9999;
	$Date_Max = 476;
	break;
	case Moyen-Age:
	$Date_Min = 476;
	$Date_Max = 1500;
	break;
	case "16ème siècle":
	$Date_Min = 1500;
	$Date_Max = 1600;
	break;
	case "17ème siècle":
	$Date_Min = 1600;
	$Date_Max = 1700;
	break;
	case "18ème siècle":
	$Date_Min = 1700;
	$Date_Max = 1800;
	break;
	case "19ème siècle":
	$Date_Min = 1800;
	$Date_Max = 1900;
	break;
	case "20ème siècle":
	$Date_Min = 1900;
	$Date_Max = 2000;
	break;
	case "21ème siècle":
	$Date_Min = 2000;
	$Date_Max = 2100;
	break;
	}
	$requete = "Select Nom_Musicien, Prénom_Musicien, Code_Musicien, Photo from Musicien Inner Join Composer ON Composer.Code_Musicien = Musicien.Code_Musicien Where Musicien.Annee_Naissance < $Date_Max And Musicien.Annee >= $Date_Min";
	  $buffer = $pdo->query($requete);

	foreach ($pdo->query($requete) as $row) {
		echo 'Nom : ' . $row['Nom_Musicien']. "<br>". 'Prenom : ' . $row[utf8_decode('Prénom_Musicien')]. "<br>". 'Code : '. $row['Code_Musicien']. "<br>" . $row['Photo']. "<br>". "<br>";
	}
	$pdo = null;

}// else {
//	echo "écrivez une lettre dans la case !";
//}
?>
</div>
</body>
</html>