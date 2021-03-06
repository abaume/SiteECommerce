<?php include('../includes/headBD.inc.php'); ?>
    <title>base de données</title>
  </head><?php include('../includes/menuBD.inc.php'); ?>
  <body>
    <h1>Base de données</h1><?php include('../includes/navbarBD.inc.php'); ?>
    <div class="texte">
      <h3>Musicien - détails</h3>
      <p>
        <?php
        include("../includes/identifiants.php");

		//Si on récupère le Code_Musicien et sa "fonction" avec la méthode GET
        if (!empty($_GET["code"]) && !empty($_GET["fonction"])) {       
                $fonction = $_GET["fonction"];
                $code = $_GET["code"];
                
                $requete = "Select Nom_Musicien, Prénom_Musicien, Code_Musicien, Année_Naissance, Année_Mort, Nom_Pays from Musicien Inner Join Pays On Pays.Code_Pays = Musicien.Code_Pays Where Code_Musicien like '$code'";
                $buffer = $pdo->query($requete);

				//Affichage des informations de l'artiste
                if ($_GET["fonction"]!="orchestre")
                {
                        foreach ($pdo->query($requete) as $row) {
                                echo 
                                "<h3>". $row['Nom_Musicien'] . " " . $row[utf8_decode('Prénom_Musicien')] . "</h3>" .
                                'Nom : ' . $row['Nom_Musicien']. "<br>" .
                                'Prénom : ' . $row[utf8_decode('Prénom_Musicien')]. "<br>".
                                'Dates : ' . $row[utf8_decode('Année_Naissance')]. ' - ' . $row[utf8_decode('Année_Mort')]. "<br>" .
                                'Pays : ' . $row['Nom_Pays']. "<br>" .
                                'Code : '. $row['Code_Musicien'] . "<br>" .
                                "<img src=\"/Classique/Home/Photo/" . $row['Code_Musicien'] . "\" alt=\"Photo\">";
                        }
                }
				//Affichage des Albums du musicien suivant sa fonction
                echo "<h3> Album(s) </h3>";
                
                switch ($fonction) {
            case "compositeur":
                        $requete = "Select Distinct Titre_Album, Album.Code_Album from Album
                        Inner Join Genre On Genre.Code_Genre = Album.Code_Genre 
                        Inner Join Musicien On Musicien.Code_Genre = Genre.Code_Genre
                        Inner Join Composer On Composer.Code_Musicien = Musicien.Code_Musicien
                        Where Musicien.Code_Musicien like '$code'";     
                break;
            case "interprete":
                $requete = "Select Distinct Titre_Album, Album.Code_Album from Album
                        Inner Join Disque On Disque.Code_Album = Album.Code_Album
                        Inner Join Composition_Disque On Disque.Code_Disque = Composition_Disque.Code_Disque
                        Inner Join Interpréter On Interpréter.Code_Morceau = Composition_Disque.Code_Morceau
                        Inner Join Musicien On Musicien.Code_Musicien= Interpréter.Code_Musicien 
                        Where Musicien.Code_Musicien like '$code'";             
                break;
            case "chef":
                        $requete = "Select Distinct Titre_Album, Album.Code_Album from Album
                        Inner Join Disque On Disque.Code_Album = Album.Code_Album
                        Inner Join Composition_Disque On Disque.Code_Disque = Composition_Disque.Code_Disque
                        Inner Join Direction On Direction.Code_Morceau = Composition_Disque.Code_Morceau
                        Inner Join Musicien On Musicien.Code_Musicien= Direction.Code_Musicien 
                        Where Musicien.Code_Musicien like '$code'";
                break;
                case "orchestre":
                        $requete = "Select Distinct Titre_Album, Album.Code_Album from Album
                        Inner Join Disque On Disque.Code_Album = Album.Code_Album
                        Inner Join Composition_Disque On Disque.Code_Disque = Composition_Disque.Code_Disque
                        Inner Join Direction On Direction.Code_Morceau = Composition_Disque.Code_Morceau
                        Inner Join Orchestres On Orchestres.Code_Orchestre = Direction.Code_Orchestre
                        Where Orchestres.Code_Orchestre like '$code'";
                break;
        }
                $buffer = $pdo->query($requete);
                
                foreach ($pdo->query($requete) as $row) {
                        echo 
                        "<h4><a href=\"album.php?code=" . $row['Code_Album'] . "\">" . $row['Titre_Album'] . "</a></h4>" .
                        "<img src=\"/Classique/Home/Pochette/" . $row['Code_Album'] . "\" alt=\"Photo\" width=\"100\">";
                }
                $pdo = null;
        }
        ?>
      </p>
    </div>
  </body>
</html>
