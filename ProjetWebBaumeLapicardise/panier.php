<?php
session_start();
if (isset($_SESSION["NOM_USER"]))
{
	echo "<p> voici votre panier ".$_SESSION["NOM_USER"]. "</p>";
}
else
{
	$url = $_SERVER["REQUEST_URI"];
	header("Location: Connexion.php?url=".$url);
}
?>
<?php include('/includes/head.inc.php'); ?>
    <title>Panier</title>
  </head>
  <?php include('/includes/menu.inc.php'); ?>
	<div class="container-fluid">
    <p> voici votre panier </p>
	</div>
  </body>
</html>
