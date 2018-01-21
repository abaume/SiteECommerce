<?php include('/includes/head.inc.php'); ?>
    <title>historique</title>
  </head><?php 
    session_start();
    include('/includes/menu.inc.php'); 
    include('/includes/identifiants.php');

  if (isset($_SESSION["Login"]))
  {
    ?>
  <body>
    <div class="container-fluid">
      <h2>Vos dernières commandes</h2><?php
      /* on selectionne les 5 dernières commandes validées de l'utilisateur */
              $requete = "Select distinct Top 5 Achat.Code_Achat, Enregistrement.Titre, Enregistrement.Code_Morceau, Album.Code_Album from Achat 
          inner join Abonné on Abonné.Code_Abonné = Achat.Code_Abonné
          inner join Enregistrement on Enregistrement.Code_Morceau = Achat.Code_Enregistrement
          inner join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
          inner join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque 
          inner join Album on Album.Code_Album = Disque.Code_Album
          where Login = '" . $_SESSION["Login"] ."' AND Achat.Achat_Confirmé IS NOT NULL
          ORDER BY Achat.Code_Achat, Enregistrement.Code_Morceau, Album.Code_Album, Enregistrement.Titre  DESC"  ;
          $buffer = $pdo->query($requete);
          $data = $buffer->fetch();

          /* on vérifie que les commandes validées ne sont pas vides */
          if (empty($data)) {
            echo '<i>Il n\'y a rien dans votre historique actuellement, <a href = "panier.php">pour revenir dans votre panier, cliquez ici</a></i>';
          } else {
            /* on affiche toutes ces commandes */
              foreach ($pdo->query($requete) as $row) {
              echo '<a href="bd/album.php?code=' . $row['Code_Album'] . '">
          <h3>'. $row['Titre'] . '</h3>
          </a> <br><img src="/Classique/Home/Pochette/' . $row['Code_Album'] . '" alt="Photo" width="100"> '; 
          
          }
      }
      }
      else
      {
              $url = $_SERVER["REQUEST_URI"];
              header("Location: Connexion.php?url=".$url);
      }
      ?>
    </div>
  </body>
</html>
