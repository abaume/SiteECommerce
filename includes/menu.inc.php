<nav>
<ul id="menu_horizontal">
  <li class="bouton_gauche"><a href = "index.php"> ACCUEIL </a></li>
  <li class="bouton_gauche"><a href = "apropos.php"> A PROPOS </a></li>
  <li class="bouton_gauche"><a href = "bd/baseIndex.php"> ALBUMS </a></li>
  <li class="bouton_droite"><a href = "panier.php"> MON PANIER </a></li>
  <li class="bouton_droite"><a href = "#Compte"> <?php if (empty($_SESSION['Login'])) { 
    echo "MON COMPTE"; } else { echo strtoupper($_SESSION['Login']);} ?> </a>  
    <ul>
    <li><a href="compte.php"> MON COMPTE </a></li>
      <?php 
      if (empty($_SESSION['Login'])) {
          echo "<li class=\"bouton_droite\"><a href = \"connexion.php\"> CONNEXION </a></li>";
      } else echo "<li class=\"bouton_droite\"><a href = \"Deconnexion.php\"> DECONNEXION </a></li>"; ?>
      <li><a href ="historique.php"> HISTORIQUE </a></li>
    </ul>
  </li>

</ul>
</nav>
