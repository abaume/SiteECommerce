<?php include('/includes/head.inc.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Accueil</title>
  </head>
  <?php
  session_start();
  include('/includes/menu.inc.php'); ?>

<div class="container-fluid row">
  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 ">
    <h1>Présentation du site</h1>
    <p>Bienvenue sur la page d&#39;accueil de ce magnifique site web e-commerce !</p>
  </div>
  <br />
  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
  <h3>Ce site est divisé en plusieurs parties :</h3>
  <ul>
    <li>Une page d&#39;accueil présentant le site.</li>
    <li>Un menu facilitant la navigation dans le site.</li>
    <li>Une page &quot;A propos&quot; décrivant le travail réalisé et précisant la liste des auteurs du site (notre binôme),
    et nos difficultés rencontrées.</li>
    <li>Un ensemble de pages constituant un catalogue et permettant de parcourir le contenu de la base (par exemple : un lien qui
    à partir d&#39;une initiale permet d&#39;accéder aux oeuvres d&#39;un compositeur, puis aux albums contenant des
    enregistrements de ces oeuvres, et enfin aux enregistrement eux-mêmes).</li>
    <li>Chaque fois que c&#39;est pertinent, affichage de la photo des musiciens ou de la pochette d&#39;un album, affichage
    d&#39;un contrôle permettant d&#39;écouter l&#39;extrait de l&#39;enregistrement concerné.</li>
    <li>Depuis la page décrivant un album, un accès aux services Amazon affichant les informations sur l&#39;album (détails,
    prix, ...) grâce à la valeur contenue dans le champ ASIN de la table Album (en utilisant l&#39;API Amazon ), ou la liste des
    albums semblables disponibles lorsque ce champ n&#39;est pas renseigné (pas un simple renvoi sur une page !).</li>
    <li>Une zone sécurisée (donc avec connexion et suivi de session) permettant de construire un panier d&#39;achat.</li>
  </div>
</div>
  </body>
</html>
