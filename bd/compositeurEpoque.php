<?php include('../includes/headBD.inc.php'); ?>
    <title>base de données</title>
  </head><?php include('../includes/menuBD.inc.php'); ?>
  <body>
    <h1>Base de données</h1><?php include('../includes/navbarBD.inc.php'); ?>
    <div class="texte">
      <h3>Compositeurs de l'époque ...</h3>
      <form method="get">
        <div class="btn-group">
        <input type="submit" value="Antiquité" name="epoque" class="bt" /> 
        <input type="submit" value="Moyen Age" name="epoque" class="bt" /> 
        <input type="submit" value="16ème siècle" name="epoque" class="bt" /> 
        <input type="submit" value="17ème siècle" name="epoque" class="bt" /> 
        <input type="submit" value="18ème siècle" name="epoque" class="bt" /> 
        <input type="submit" value="19ème siècle" name="epoque" class="bt" /> 
        <input type="submit" value="20ème siècle" name="epoque" class="bt" /></div>
        <br />
        <br />
      </form><?php
      include("../includes/identifiants.php");
      $pdo = new PDO($pdodsn, $user, $password);

      if (!empty($_GET["epoque"])) {
              $epoque = $_GET["epoque"];      
              switch ($epoque){
              case "Antiquité":
              $Date_Min = -9999;
              $Date_Max = 476;
              break;
              case "Moyen Age":
              $Date_Min = 476;
              $Date_Max = 1500;
              break;
              case "16ème siècle":
              $Date_Min = 1500;
              $Date_Max = 1600;
              break;
              case "17ème siècle":
              $Date_Min = 1600;
              $Date_Max = 1700;
              break;
              case "18ème siècle":
              $Date_Min = 1700;
              $Date_Max = 1800;
              break;
              case "19ème siècle":
              $Date_Min = 1800;
              $Date_Max = 1900;
              break;
              case "20ème siècle":
              $Date_Min = 1900;
              $Date_Max = 2000;
              break;
              }
              
              $requete = "Select Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien from Musicien Inner Join Composer On Composer.Code_Musicien = Musicien.Code_Musicien Where Musicien.Année_Naissance < $Date_Max And Musicien.Année_Naissance >= $Date_Min Group By Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien";
                $buffer = $pdo->query($requete);

              foreach ($pdo->query($requete) as $row) {
                      echo 'Nom : ' . "<a href=\"musicien.php?fonction=compositeur&code=" . $row['Code_Musicien']. "\">" . $row['Nom_Musicien']. "</a><br>". 'Prenom : ' . $row[utf8_decode('Prénom_Musicien')]. "<br>". 'Code : '. $row['Code_Musicien']. "<br>". "<br>". "<br>";
              }
              $pdo = null;

      }
      ?>
    </div>
  </body>
</html>
