<?php include('/includes/head.inc.php'); ?>
    <title>Panier</title>
  </head>
  <?php include('/includes/menu.inc.php'); 

if (isset($_SESSION["Login"]))
{
  ?>
	<div class="container-fluid">
    <p> voici votre panier </p>

<?php
  	$requete = "Select Enregistrement.Titre, Album.Code_Album from Achat 
    inner join Abonné on Abonné.Code_Abonné = Achat.Code_Abonné
    inner join Enregistrement on Enregistrement.Code_Morceau = Achat.Code_Enregistrement
    inner join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
    inner join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque 
    inner join Album on Album.Code_Album = Disque.Code_Album
    where Login = '" . $_SESSION["Login"] ."'";
    $buffer = $pdo->query($requete);
    $data=$buffer->fetch();

    if (empty($data)) {
      echo "<i>Il n'y a rien dans votre panier actuellement</i>";
    } else {
	foreach ($pdo->query($requete) as $row) {
        
    echo '<a href="bd/album.php?code=' . $row['Code_Album'] . '">
    <h3>'. $row['Titre'] . '</h3>
    </a> <br>  <img src="/Classique/Home/Pochette/' . $row['Code_Album'] . '" alt="Photo" width="100"> <form method="get"> 
    <span class="btn"><input type="submit" name="supprimer" value="' . $row['Code_Album'] .'"/></span></form>'; 

    }
    if(!empty($_REQUEST['supprimer'])) {
      $data2 = NULL;
      while (empty($data2)) {
        $AlbumRequete = "SELECT Enregistrement.Code_Morceau FROM Enregistrement 
                        inner join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
                        inner join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque 
                        inner join Album on Album.Code_Album = Disque.Code_Album
                        WHERE Album.Code_Album = " . $_REQUEST['supprimer'];
      $data2 = $pdo->query($AlbumRequete)->fetch();
      echo "données = " . $data2['Code_Morceau'];
      $SuppressionRequete = "DELETE FROM Achat WHERE Code_Enregistrement =" . $data2['Code_Morceau'] ;
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

    ?> <form method="get">
    <span class="btn"><input type="submit" name="vider" value="vider panier" /></span></form>

<!-- <input type="hidden" name="fieldsCount" value="<?php echo $fields+1 ?>" /> -->
    <?php
	}
	$pdo = null;
?>

	</div>
  <?php
}
else
{
	$url = $_SERVER["REQUEST_URI"];
	header("Location: Connexion.php?url=".$url);
}
?>

  </body>
</html>
