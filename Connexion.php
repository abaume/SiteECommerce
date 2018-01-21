<?php include('/includes/head.inc.php'); ?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>connexion</title>
  </head><?php include('/includes/menu.inc.php'); ?><?php

 
  $pseudo=(isset($_SESSION['Login']))?$_SESSION['Login']:'';

  /* on récupère l'adresse de la page précédente*/
  $url=$_SERVER['HTTP_REFERER'];

   /* on vérifie qu'on est pas déjà connecté */
  if (!isset($_POST['Login']))
  {
    ?>
  <body>
    <div class="container-fluid">
      <!-- on crée un formulaire pour envoyer les données de connexion à Traite_Connexion.php -->
      <form method="post" action="Traite_Connexion.php?url=<?php echo $url?>">
        <fieldset>
          <h1>
            <legend>Connexion</legend>
          </h1>
          <p>
          <label for="Login">Pseudo :</label>
          <input name="Login" type="text" id="Login" />
          <br />
          <label for="password">Mot de passe :</label> 
          <input name="Password" type="password" id="password" /></p>
        </fieldset>
        <p>
          <span class="btn">
            <input name="Connect" type="submit" value="Connecter" />
          </span>
        </p>
      </form>
      <a href="enregistrement.php">Pas encore inscrit ?</a>
    </div><?php
    }
    ?>
  </body>
</html>
