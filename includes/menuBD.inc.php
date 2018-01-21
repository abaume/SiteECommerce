<nav>
<ul id="menu_horizontal">
  <li class="bouton_gauche"><a href = "../includes/index.php"> ACCUEIL </a></li>
  <li class="bouton_gauche"><a href = "../includes/apropos.php"> A PROPOS </a></li>
  <li class="bouton_gauche"><a href = "/baseIndex.php"> ALBUMS </a></li>
  <li class="bouton_droite"><a href = "../includes/panier.php"> MON PANIER </a></li>
  <li class="bouton_droite"><a href = "#Compte"> <?php if (empty($_SESSION['Login'])) { 
    echo "MON COMPTE"; } else { echo strtoupper($_SESSION['Login']);} ?> </a>  
    <ul>
      <?php 
      if (empty($_SESSION['Login'])) {
          echo "<li class=\"bouton_droite\"><a href = \"../includes/connexion.php\"> CONNEXION </a></li>";
      } else echo "<li class=\"bouton_droite\"><a href = \"../includes/Deconnexion.php\"> DECONNEXION </a></li>"; ?>
      <li><a href ="historique.php"> HISTORIQUE </a></li>
    </ul>
  </li>

</ul>
</nav>