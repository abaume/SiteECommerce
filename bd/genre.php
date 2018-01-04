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
<h3>Genres</h3> 

<form method="get">
<p>
<div class="btn-group">
	
	<input type="submit" value="Moyen Age" name="genre" class="bt"/>
	<input type="submit" value="Renaissance" name="genre" class="bt"/>
	<input type="submit" value="Baroque" name="genre" class="bt"/>
	<input type="submit" value="Classique" name="genre" class="bt"/>
	<input type="submit" value="Romantique" name="genre" class="bt"/>
	<input type="submit" value="Moderne" name="genre" class="bt"/>
	<input type="submit" value="Comptemporain" name="genre" class="bt"/>
	<input type="submit" value="Opera" name="genre" class="bt"/>
	<input type="submit" value="Musique Sacrée" name="genre" class="bt"/>
	<input type="submit" value="Oratorio" name="genre" class="bt"/>
	<input type="submit" value="Musique ancienne" name="genre" class="bt"/>
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

if (!empty($_GET["genre"])) {
	$genre = $_GET["genre"];
	
	$requete = "Select Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien from Musicien Inner Join Genre ON Musicien.Code_Genre = Genre.Code_Genre Where Genre.Libellé_Abrégé Like '%$genre%' Group By Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien";
	  $buffer = $pdo->query($requete);

	foreach ($pdo->query($requete) as $row) {
		echo 'Nom : ' . $row['Nom_Musicien']. "<br>". 'Prenom : ' . $row[utf8_decode('Prénom_Musicien')]. "<br>". 'Code : '. $row['Code_Musicien']. "<br>" . "<br>". "<br>";
		echo $genre;
	}
	$pdo = null;
}
// else {
//	echo "écrivez une lettre dans la case !";
//}
?>
</div>
</body>
</html>
