<?php 

include('/membre_connecte.inc.php');
  ?>

<nav>
<ul id="menu_horizontal">
<li class="bouton_gauche"><a href = "index.php"> ACCUEIL </a></li>
<li class="bouton_gauche"><a href = "apropos.php"> A PROPOS </a></li>
<li class="bouton_gauche"><a href = "bd/baseIndex.php"> ALBUMS </a></li>
<li class="bouton_droite"><a href = "panier.php"> MON PANIER </a></li>
<?php 
if (empty($_SESSION['Login'])) {
    echo "<li class=\"bouton_droite\"><a href = \"connexion.php\"> CONNEXION </a></li>";
} else echo "<li class=\"bouton_droite\"><a href = \"Deconnexion.php\"> DECONNEXION </a></li>"; ?>

</ul>
</nav>
