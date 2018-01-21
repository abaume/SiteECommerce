<?php include('/includes/head.inc.php'); ?>
    <title>Panier</title>
  </head><?php
    session_start(); 
    include('/includes/menu.inc.php'); 
    include('/includes/identifiants.php');

  if (isset($_SESSION["Login"]))
  {
    ?>
  <body>
    <div class="container-fluid">
      <h2>Votre panier</h2><?php
              $requete = "Select distinct Enregistrement.Titre, Enregistrement.Code_Morceau, Album.Code_Album from Achat 
          inner join Abonné on Abonné.Code_Abonné = Achat.Code_Abonné
          inner join Enregistrement on Enregistrement.Code_Morceau = Achat.Code_Enregistrement
          inner join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
          inner join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque 
          inner join Album on Album.Code_Album = Disque.Code_Album
          where Login = '" . $_SESSION["Login"] ."' AND Achat.Achat_Confirmé IS NULL"  ;
          $buffer = $pdo->query($requete);
          $data=$buffer->fetch();

          if (empty($data)) {
            echo "<i>Il n'y a rien dans votre panier actuellement</i>";
          } else {
              foreach ($pdo->query($requete) as $row) {
              
          $req = "SELECT count(*) as Nombre from Achat 
          Inner join Abonné on Abonné.Code_Abonné = Achat.Code_Abonné
          where Code_Enregistrement = ". $row['Code_Morceau'] . " and Login like '". $_SESSION['Login'] . "'" ;
          $prepare = $pdo->query($req);
          $nb = $prepare->fetch();

          echo '<a href="bd/album.php?code=' . $row['Code_Album'] . '">
          <h3>'. $row['Titre'] . '</h3>
          </a> <br>  <form method="get"><img src="/Classique/Home/Pochette/' . $row['Code_Album'] . '" alt="Photo" width="100"> x ' . $nb['Nombre'] . ' 
          <span class="btn"><input type="hidden" name="supprimer" value="' . $row['Code_Album'] .'"/><input type="submit" value="Supprimer" /></span></form>'; 
          
          $AlbumRequete = "SELECT * from Achat
                              inner join Abonné on Abonné.Code_Abonné = Achat.Code_Abonné
                              inner join Enregistrement on Enregistrement.Code_Morceau = Achat.Code_Enregistrement
                              inner join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
                              inner join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque 
                              inner join Album on Album.Code_Album = Disque.Code_Album
                              where Album.Code_Album =" . $row['Code_Album'] . "and Login like '" . $_SESSION['Login'] . "'";
          
          if(!empty($_REQUEST['supprimer'])) {
            $data2 = $pdo->query($AlbumRequete)->fetch();

            $SuppressionRequete = "DELETE FROM Achat WHERE Code_Achat =" . $data2['Code_Achat'] ;
            $supprimer = $pdo->query($SuppressionRequete);
            }
            
          }

          if (!empty($_REQUEST['vider'])) {
            $CodeAbonnéRequete = "SELECT Abonné.Code_Abonné FROM Abonné WHERE Abonné.Login = '" . $_SESSION['Login'] . "'";
            $CodeAbonnéExecution = $pdo->query($CodeAbonnéRequete);
            
            foreach ($pdo->query($CodeAbonnéRequete) as $row) {
              $ViderPanier = "DELETE FROM Achat WHERE Code_Abonné =" . $row[utf8_decode('Code_Abonné')];
              $buffer = $pdo->query($ViderPanier);
            }
          }

          if (!empty($_REQUEST['commander'])) {
            foreach ($pdo->query($AlbumRequete) as $row) {
              $RequeteUpdate = "UPDATE Achat SET Achat_Confirmé = 1 WHERE Code_Achat =" . $row['Code_Achat'];
              $buffer = $pdo->query($RequeteUpdate);
            }
          }

          ?>
      <form method="get">
        <span class="btn-group">
        <input type="submit" name="vider" value="Vider panier" class="bt" /> 
        <input type="submit" name="commander" value="Commander" class="bt" />
      </form><?php
        }
        echo '<form method="post" action="historique.php"><input name="historique" type="submit" value="Accéder à mon historique de commandes" /></span></form></p>';
              $pdo = null;
      ?>
    </div><?php
    }
    else
    {
            $url = $_SERVER["REQUEST_URI"];
            header("Location: Connexion.php?url=".$url);
    }
    ?>
  </body>
</html>
