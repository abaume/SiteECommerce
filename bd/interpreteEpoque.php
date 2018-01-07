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
<h3>Interprètes de l'époque...</h3> 

<form method="get">
<p>
<div class="btn-group">
	<input type="submit" value="Avant 1900" name="epoque" class="bt"/>
	<input type="submit" value="1900-1910" name="epoque" class="bt"/>
	<input type="submit" value="1910-1920" name="epoque" class="bt"/>
	<input type="submit" value="1920-1930" name="epoque" class="bt"/>
	<input type="submit" value="1930-1940" name="epoque" class="bt"/>
	<input type="submit" value="1940-1950" name="epoque" class="bt"/>
	<input type="submit" value="1950-1960" name="epoque" class="bt"/>
	<input type="submit" value="1960-1970" name="epoque" class="bt"/>
	<input type="submit" value="1970-1980" name="epoque" class="bt"/>
	<input type="submit" value="Après 1980" name="epoque" class="bt"/>
</div>
</p>
<br /><br />
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

if (!empty($_GET["epoque"])) {
	$epoque = $_GET["epoque"];	
	switch ($epoque){
	case "Avant 1900":
	$Date_Min = -9999;
	$Date_Max = 1900;
	break;
	case "1900-1910":
	$Date_Min = 1900;
	$Date_Max = 1910;
	break;
	case "1910-1920":
	$Date_Min = 1910;
	$Date_Max = 1920;
	break;
	case "1920-1930":
	$Date_Min = 1920;
	$Date_Max = 1930;
	break;
	case "1930-1940":
	$Date_Min = 1930;
	$Date_Max = 1940;
	break;
	case "1940-1950":
	$Date_Min = 1940;
	$Date_Max = 1950;
	break;
	case "1950-1960":
	$Date_Min = 1950;
	$Date_Max = 1960;
	break;
	case "1960-1970":
	$Date_Min = 1960;
	$Date_Max = 1970;
	break;
	case "1970-1980":
	$Date_Min = 1970;
	$Date_Max = 1980;
	break;
	case "Après 1980":
	$Date_Min = 1980;
	$Date_Max = 3000;
	break;
	}
	$requete = "Select Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien from Musicien Inner Join Interpréter ON Interpréter.Code_Musicien = Musicien.Code_Musicien Where Musicien.Année_Naissance < $Date_Max And Musicien.Année_Naissance >= $Date_Min Group By Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien";
	  $buffer = $pdo->query($requete);

	foreach ($pdo->query($requete) as $row) {
		echo 'Nom : ' . "<a href=\"musicien.php?code=" . $row['Code_Musicien']. "\">" . $row['Nom_Musicien']. "</a><br>". 'Prenom : ' . $row[utf8_decode('Prénom_Musicien')]. "<br>". 'Code : '. $row['Code_Musicien']. "<br>" . "<br>". "<br>";
	}
	$pdo = null;

}// else {
//	echo "écrivez une lettre dans la case !";
//}
?>
</div>
</body>
</html>
