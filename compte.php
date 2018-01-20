<?php include('/includes/head.inc.php'); ?>
<title>connexion</title>
</head> 
<?php include('/includes/menu.inc.php'); ?>
<?php
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

if ($id !=0) erreur(ERR_IS_CO);

$url = $_SERVER["REQUEST_URI"];

if (empty($_POST['pseudo'])) {
    ?>
    <h2> <?php echo $_SESSION['Login']; ?> </h2>

	pour chaque information dans la table Abonné {
		<form method="post" action="Traite_Compte.php">
		écrire [nom_colonne] : [résultat colonne]
		<input type="submit" value="Modifier" /></form>
	}
</div>
        <?php
}
?>
</body>
</html> 
