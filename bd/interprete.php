<?php include('../includes/headBD.inc.php'); ?>
    <title>base de données</title>
  </head><?php include('../includes/menuBD.inc.php'); ?>
  <body>
    <h1>Base de données</h1><?php include('../includes/navbarBD.inc.php'); ?>
    <div class="texte">
      <h3>Interprètes commancants par la/les lettre(s)...</h3>
      <form method="get">Lettre(s): 
      <input type="text" name="n" />
      <br />
	  <span class="btn">
      <input type="submit" value="Afficher" />
	  </span>
      <br />
      <br /></form><?php
      // Paramètres de connexion
      include("../includes/identifiants.php");

      if (!empty($_GET["n"])) {
              $lettre = $_GET["n"];
              $requete = "Select Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien from Musicien 
              Inner Join Interpréter ON Interpréter.Code_Musicien = Musicien.Code_Musicien Where Nom_Musicien Like '$lettre%'
              Group By Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien 
              Order By Musicien.Nom_Musicien, Musicien.Prénom_Musicien";
                $buffer = $pdo->query($requete);

              foreach ($pdo->query($requete) as $row) {
                      echo 'Nom : ' . "<a href=\"musicien.php?fonction=interprete&code=" . $row['Code_Musicien']. "\">" . $row['Nom_Musicien']. "</a><br>". 'Prenom : ' . $row[utf8_decode('Prénom_Musicien')]. "<br>". 'Code : '. $row['Code_Musicien']. "<br><br><br>";
              }
              $pdo = null;
      }
      ?>
    </div>
  </body>
</html>
