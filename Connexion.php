<?php include('/includes/head.inc.php'); ?>
<title>connexion</title>
</head> 
<?php include('/includes/menu.inc.php'); ?>
<?php
session_start();
if ($id !=0) erreur(ERR_IS_CO);
?>
  <div class="container-fluid">
    <h1>Connexion</h1>
    <form method="post" action="Traite_Connexion.php?url=%3C?php%20echo%20$_REQUEST[">
	Nom : 
    <input name="Login" type="text" />
    <br />Mot de passe : 
    <input name="Password" type="text" />
    <br />
    <input name="Connect" type="submit" value="Connecter" /></form>
	</div>
  </body>
</html>
