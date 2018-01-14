<?php include('/includes/head.inc.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Accueil</title>
  </head>
  <?php

  include('/includes/menu.inc.php'); ?>

<?php echo'<i>Vous êtes ici : </i><a href ="./index.php">Index du forum</a>';?>

    <div class="container-fluid">
    <h1>Présentation du site</h1>
    <br />
    <p>Bienvenue sur la page d&#39;accueil de ce magnifique site web e-commerce !</p>
    <h3>Ce site est divisé en plusieurs parties :</h3>Une page d&#39;accueil présentant le site.
    <br />Un menu facilitant la navigation dans le site.
    <br />Une page &quot;A propos&quot; décrivant le travail réalisé et précisant la liste des auteurs du site (notre binôme),
    et nos difficultés rencontrées.
    <br />Un ensemble de pages constituant un catalogue et permettant de parcourir le contenu de la base (par exemple : un lien qui
    à partir d&#39;une initiale permet d&#39;accéder aux oeuvres d&#39;un compositeur, puis aux albums contenant des
    enregistrements de ces oeuvres, et enfin aux enregistrement eux-mêmes).
    <br />Chaque fois que c&#39;est pertinent, affichage de la photo des musiciens ou de la pochette d&#39;un album, affichage
    d&#39;un contrôle permettant d&#39;écouter l&#39;extrait de l&#39;enregistrement concerné.
    <br />Depuis la page décrivant un album, un accès aux services Amazon affichant les informations sur l&#39;album (détails,
    prix, ...) grâce à la valeur contenue dans le champ ASIN de la table Album (en utilisant l&#39;API Amazon ), ou la liste des
    albums semblables disponibles lorsque ce champ n&#39;est pas renseigné (pas un simple renvoi sur une page !).
    <br />Une zone sécurisée (donc avec connexion et suivi de session) permettant de construire un panier d&#39;achat.
    </div>
  </body>
</html>
