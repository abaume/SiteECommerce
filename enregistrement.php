<?php include('/includes/head.inc.php'); ?>
    <title>connexion</title>
  </head><?php include('/includes/menu.inc.php'); ?><?php
  $id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
  $pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

  /* on récupère l'adresse de la page précédente */
  $url = $_SERVER["REQUEST_URI"];

  /* si on n'est pas connecté */
  if (empty($_POST['pseudo'])) {
      ?>
  <body>
    <!-- on crée un formulaire pour récupérer les données envoyées à Traite_Enregistrement -->
    <h1>Inscription</h1>
    <form method="post" action="Traite_Enregistrement.php?url=<?php echo $url?>">
      <fieldset>
      <legend>Identifiants</legend> 
      <label for="Login">*Pseudo :</label> 
      <input name="Login" type="text" id="Login" />
      <br />
      <label for="Password">*Mot de Passe :</label> 
      <input name="Password" type="password" id="Password" />
      <br /></fieldset>
      <fieldset>
      <legend>Personnel</legend> 
      <label for="Nom">Nom :</label> 
      <input name="Nom" type="text" id="Nom" />
      <br />
      <label for="Prenom">Prénom :</label> 
      <input name="Prenom" type="text" id="Prenom" />
      <br /></fieldset>
      <fieldset>
      <legend>Coordonnées</legend> 
      <label for="Adresse">Adresse :</label> 
      <input name="Adresse" type="text" id="Adresse" />
      <br />
      <label for="Ville">Ville :</label> 
      <input name="Ville" type="text" id="Ville" />
      <br />
      <label for="CodePostal">Code Postal :</label> 
      <input name="CodePostal" type="text" id="CodePostal" />
      <br />
      <label for="Pays">Pays :</label> 
      <input name="Pays" type="text" id="Pays" />
      <br />
      <label for="Mail">Adresse mail :</label> 
      <input name="Mail" type="text" id="Mail" />
      <br /></fieldset>
      <p>Les champs précédés d'un * sont obligatoires</p>
      <p>
        <span class="btn">
          <input type="submit" value="S&#39;inscrire" />
        </span>
      </p>
    </form>
    <label>Se souvenir de moi ?</label>
    <form>
      <input type="checkbox" name="souvenir" />
      <br /><?php
      }
      ?>
    </form>
  </body>
</html>
