<?php include('/includes/head.inc.php'); ?>
    <title>Panier</title>
  </head><?php
    session_start(); 
    include('/includes/menu.inc.php'); 
    include('/includes/identifiants.php');

    /* si on est connecté */ 
  if (isset($_SESSION["Login"]))
  {
    ?>
  <body>
    <div class="container-fluid">
      <h2>Votre panier</h2><?php
      /* requete selectionne les informations des achats non confirmés de l'abonné en supprimant les doublons */
              $requete = "Select distinct Enregistrement.Titre, Enregistrement.Code_Morceau, Album.Code_Album from Achat 
          inner join Abonné on Abonné.Code_Abonné = Achat.Code_Abonné
          inner join Enregistrement on Enregistrement.Code_Morceau = Achat.Code_Enregistrement
          inner join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
          inner join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque 
          inner join Album on Album.Code_Album = Disque.Code_Album
          where Login = '" . $_SESSION["Login"] ."' AND Achat.Achat_Confirmé IS NULL"  ;
          $buffer = $pdo->query($requete);
          $data=$buffer->fetch();

          /* s'il n'y a rien dans les achats de l'abonné, on affiche un message */
          if (empty($data)) {
            echo "<i>Il n'y a rien dans votre panier actuellement</i>";
          } else {

            foreach ($pdo->query($requete) as $row) {
              
              /* on compte le nombre de fois qu'un morceau est dans le panier de l'abonné */
              $req = "SELECT count(*) as Nombre from Achat 
              Inner join Abonné on Abonné.Code_Abonné = Achat.Code_Abonné
              where Code_Enregistrement = ". $row['Code_Morceau'] . " and Login like '". $_SESSION['Login'] . "'" ;
              $prepare = $pdo->query($req);
              $nb = $prepare->fetch();

              /* on affiche les informations de chaque album sélectionné avec le nombre de fois où il est présent */
              echo '<a href="bd/album.php?code=' . $row['Code_Album'] . '">
              <h3>'. $row['Titre'] . '</h3>
              </a> <br>  <form method="get"><img src="/Classique/Home/Pochette/' . $row['Code_Album'] . '" alt="Photo" width="100"> x ' . $nb['Nombre'] . ' 
              <span class="btn"><input type="hidden" name="supprimer" value="' . $row['Code_Album'] .'"/><input type="submit" value="Supprimer" /></span></form>'; 
              
              /* on sélectionne tous les attributs des albums sans distinction */
              $AlbumRequete = "SELECT * from Achat
                              inner join Abonné on Abonné.Code_Abonné = Achat.Code_Abonné
                              inner join Enregistrement on Enregistrement.Code_Morceau = Achat.Code_Enregistrement
                              inner join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
                              inner join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque 
                              inner join Album on Album.Code_Album = Disque.Code_Album
                              where Album.Code_Album =" . $row['Code_Album'] . "and Login like '" . $_SESSION['Login'] . "'";
          
          /* si l'abonné a cliqué sur supprimer un album */
          if(!empty($_REQUEST['supprimer'])) {
            /* on récupère la ligne du premier achat avec un album correspondant à celui demandé */
            $data2 = $pdo->query($AlbumRequete)->fetch();
            $SuppressionRequete = "DELETE FROM Achat WHERE Code_Achat =" . $data2['Code_Achat'] ;
            $supprimer = $pdo->query($SuppressionRequete);
            }    
          }

          /* si l'abonné a cliqué sur vider le panier */
          if (!empty($_REQUEST['vider'])) {
            /* on récupère le code de l'abonné en cours */
            $CodeAbonnéRequete = "SELECT Abonné.Code_Abonné FROM Abonné WHERE Abonné.Login = '" . $_SESSION['Login'] . "'";
            $CodeAbonnéExecution = $pdo->query($CodeAbonnéRequete);
            
            /* pour chaque achat non confirmé de l'abonné, on le supprime */
            foreach ($pdo->query($CodeAbonnéRequete) as $row) {
              $ViderPanier = "DELETE FROM Achat WHERE Code_Abonné =" . $row[utf8_decode('Code_Abonné')] . "AND Achat_Confirmé IS NULL";
              $buffer = $pdo->query($ViderPanier);
            }
          }

          /* si l'abonné a cliqué sur commander */
          if (!empty($_REQUEST['commander'])) {
            /* pour chaque Achat de Abonné, on confirme l'achat */
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
        </span>
      </form><?php
        }
        echo '<form method="post" action="historique.php"><input name="historique" type="submit" value="Accéder à mon historique de commandes" /></span></form></p>';
              $pdo = null;
      ?>
    </div><?php
    }
    /* si on n'est pas connecté, on nous renvoie sur la page de connexion */
    else
    {
            $url = $_SERVER["REQUEST_URI"];
            header("Location: Connexion.php?url=".$url);
    }
    ?>
  </body>
</html>
