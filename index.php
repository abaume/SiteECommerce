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
    <p>Bienvenue sur la page d'accueil de ce magnifique site web e-commerce !</p>
  </div>
  <br />
  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
  <h3>Ce site est divisé en plusieurs parties :</h3>
  <ul>
    <li>Cette page d'accueil présentant le site.</li>
    <li>Un menu facilitant la navigation dans le site.</li>
    <li>Une page "A propos" décrivant le travail réalisé et précisant la liste des auteurs du site (notre binôme),
    et nos difficultés rencontrées.</li>
    <li>Un ensemble de pages accessible depuis l'onglet "Albums", constituant un catalogue et permettant de parcourir le contenu de la base. Par exemple : à partir d'une initiale ou du début du nom d'un compositeur, on peut accéder à ses albums contenant des enregistrements de ses oeuvres, et enfin pouvoir les écouter ou bien même avoir des informations proposées par Amazon.</li>
    <li>Chaque fois que c'est pertinent, un affichage d'une photo des musiciens ou de la pochette d'un album ainsi qu'un contrôle permettant d'écouter l'extrait de l'enregistrement concerné.</li>
    <li>Depuis la page décrivant un album, un accès aux services Amazon affichant les informations sur l'album (détails, prix, ...), ou la liste des
    albums semblables disponibles lorsque qu'une correspondance n'a pu être faite.</li>
    <li>Une zone sécurisée (donc avec connexion et suivi de session) permettant de construire un panier d'achat, de le vider partiellement ou totalement et de confirmer celui-ci ; mais aussi afficher les 5 derniers albums commandés</li>
  </div>
</div>
  </body>
</html>
