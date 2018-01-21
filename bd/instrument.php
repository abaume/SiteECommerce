<?php include('../includes/headBD.inc.php'); ?>
    <title>base de données</title>
  </head><?php include('../includes/menuBD.inc.php'); ?>
  <body>
    <h1>Base de données</h1><?php include('../includes/navbarBD.inc.php'); ?>
    <div class="texte">
      <h2>Instruments</h2>
      <p>
        <?php
        include("../includes/identifiants.php");

                $requete1 = "Select Instrument.Nom_Instrument from Instrument Where Instrument.Nom_Instrument NOT LIKE 'Viole d''amour' AND Instrument.Nom_Instrument NOT LIKE '
				Composition'";
                $buffer = $pdo->query($requete1);
                foreach ($pdo->query($requete1) as $row) {
                    echo "<h4><fieldset class =\"instrument\"><legend>". $row['Nom_Instrument']. "</legend></h4>";
                    $instru = $row['Nom_Instrument'];
                    $requete2 = "Select Nom_Musicien, Prénom_Musicien, Code_Musicien from Musicien Inner Join Instrument On Instrument.Code_Instrument = Musicien.Code_Instrument Where Instrument.Nom_Instrument Like '$instru' Group By Nom_Musicien, Prénom_Musicien, Code_Musicien";
                    $buffer = $pdo->query($requete2);
                    foreach ($pdo->query($requete2) as $row) {
                        echo "<a href=\"musicien.php?fonction=interprete&code=" . $row['Code_Musicien']. "\">" .$row['Nom_Musicien']. " " . $row[utf8_decode('Prénom_Musicien')]. "</a> ; ";
                    }						
					echo "</fieldset>";
                }
                $pdo = null;
        ?>
      </p>
    </div>
  </body>
</html>
