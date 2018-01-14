<?php include('/includes/head.inc.php'); ?>
    <title>Panier</title>
  </head>
  <?php include('/includes/menu.inc.php'); 

if (isset($_SESSION["Login"]))
{
  ?>
	<div class="container-fluid">
    <p> voici votre panier </p>

<?php
  	$requete = "Select Titre, Code_Album from Achat 
    inner join Abonné on Abonné.Code_Abonné = Achat.Code_Abonné
    inner join Enregistrement on Enregistrement.Code_Morceau = Achat.Code_Enregistrement
    where Login = '" . $_SESSION["Login"] ."'";
	  $buffer = $pdo->query($requete);

	foreach ($pdo->query($requete) as $row) {
		echo 'Album : <a href="album.php?code="' . $row['Code_Album'] . '">' . $row['Titre'] . "</a><br><br><br>";
	}
	$pdo = null;
?>

	</div>
  <?php
}
else
{
	$url = $_SERVER["REQUEST_URI"];
	header("Location: Connexion.php?url=".$url);
}
?>

  </body>
</html>
