<?php include('../includes/headBD.inc.php'); ?>
    <title>base de données</title>
  </head><?php include('../includes/menuBD.inc.php'); ?>
  <body>
    <h1>Base de données</h1><?php include('../includes/navbarBD.inc.php'); ?>
    <div class="texte">
      <h3>Genres</h3>
      <form method="get">
        <div class="btn-group">
        <input type="submit" value="Moyen Age" name="genre" class="bt" /> 
        <input type="submit" value="Renaissance" name="genre" class="bt" /> 
        <input type="submit" value="Baroque" name="genre" class="bt" /> 
        <input type="submit" value="Classique" name="genre" class="bt" /> 
        <input type="submit" value="Romantique" name="genre" class="bt" /> 
        <input type="submit" value="Moderne" name="genre" class="bt" /> 
        <input type="submit" value="Contemporain" name="genre" class="bt" /> 
        <input type="submit" value="Opera" name="genre" class="bt" /> 
        <input type="submit" value="Musique Sacrée" name="genre" class="bt" /> 
        <input type="submit" value="Oratorio" name="genre" class="bt" /> 
        <input type="submit" value="Musique ancienne" name="genre" class="bt" /></div>
        <br />
        <br />
      </form><?php
      include("../includes/identifiants.php");

      if (!empty($_GET["genre"])) {
              $genre = $_GET["genre"];
              
              $requete = "Select Distinct Titre_Album, Album.Code_Album from Album
              Inner Join Genre On Genre.Code_Genre = Album.Code_Genre
                      Where Genre.Libellé_Abrégé like '%$genre%'";
                $buffer = $pdo->query($requete);

              foreach ($pdo->query($requete) as $row) {
                      echo "<p><a href=\"album.php?code=" . $row['Code_Album'] . "\">" . $row['Titre_Album'] . "</a></h4>" .
                      "<br><img src=\"/Classique/Home/Pochette/" . $row['Code_Album'] . "\" alt=\"Photo\" width=\"100\"></p>";
              }
              $pdo = null;
      }
      ?>
    </div>
  </body>
</html>
