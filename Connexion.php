<?php include('/includes/head.inc.php'); ?>
<title>connexion</title>
</head> 
<?php include('/includes/menu.inc.php'); ?>
<?php
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['Login']))?$_SESSION['Login']:'';

$url=$_SERVER['HTTP_REFERER'];

if ($id !=0) erreur(ERR_IS_CO);
else {

if (!isset($_POST['Login']))
{
  ?>
   <div class="container-fluid">
    <form method="post" action="Traite_Connexion.php?url=<?php echo $url?>">
	<fieldset>
  <legend> <h1>Connexion</h1> </legend>
  <p>
  <label for="Login"> Pseudo :</label><input name="Login" type="text" id="Login"/>
    <br />
  <label for="password"> Mot de passe : </label><input name="Password" type="password" id="password"/>
    </p>
    </fieldset>
    <p>
    <span class="btn"><input name="Connect" type="submit" value="Connecter"/></form></span>
    <a href="enregistrement.php"> Pas encore inscrit ?</a>
	</div>
  <?php
}
}
?>
  </body>
</html>
