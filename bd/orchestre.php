<?php include('../includes/headBD.inc.php'); ?>
    <title>base de données</title>
  </head><?php include('../includes/menuBD.inc.php'); ?>
  <body>
    <h1>Base de données</h1><?php include('../includes/navbarBD.inc.php'); ?>
    <div class="texte">
      <h3>Orchestres commancants par la/les lettre(s)...</h3>
      <form method="get">Lettre(s): 
      <input type="text" name="n" />
      <br />
	  <span class="btn">
      <input type="submit" value="Afficher" />
	  </span>
      <br />
      <br /></form><?php
      include("../includes/identifiants.php");

      if (!empty($_GET["n"])) {
              $lettre = $_GET["n"];
              $requete = "Select Nom_Orchestre, Code_Orchestre from Orchestres Where Nom_Orchestre Like '$lettre%' Order By Nom_Orchestre, Code_Orchestre";
              $buffer = $pdo->query($requete);

              foreach ($pdo->query($requete) as $row) {
                      echo 'Nom : ' . "<a href=\"musicien.php?fonction=orchestre&code=" . $row['Code_Orchestre'] . "\">" . $row['Nom_Orchestre']. "</a>" . "<br>". 'Code : '. $row['Code_Orchestre']. "<br>";
              }
              $pdo = null;
      }
      ?>
    </div>
  </body>
</html>
