<?php include('/includes/head.inc.php'); ?>
<title>connexion</title>
</head> 
<?php include('/includes/menu.inc.php'); ?>
<?php
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

session_start();
if ($id !=0) erreur(ERR_IS_CO);

include("./functions/erreur.php");
include("./functions/constant.php");

if (!isset($_POST['pseudo']))
{
  ?>
   <div class="container-fluid">
    <form method="post" action="Traite_Connexion.php?url=%3C?php%20echo%20$_REQUEST[">
	<fieldset>
  <legend> <h1>Connexion</h1> </legend>
  <p>
  <label for="pseudo"> Pseudo :</label><input name="pseudo" type="text" id="pseudo"/>
    <br />
  <label for="password"> Mot de passe : </label><input name="Password" type="text" id="password"/>
    </p>
    </fieldset>
    <p>
    <input name="Connect" type="submit" value="Connecter" /></form>
    <a href="/register.php"> Pas encore inscrit ?</a>
	</div>
  <?php
}
?>
  </body>
</html>