<?php 
 session_start(); ?>

<?php include('../includes/membre_connecte.inc.php'); ?>

<ul id="menu_horizontal">
<li class="bouton_gauche"><a href = "../index.php"> Accueil </a></li>
<li class="bouton_gauche"><a href = "../apropos.php"> A propos </a></li>
<li class="bouton_gauche"><a href = "baseIndex.php"> Contenu BD </a></li>
<li class="bouton_droite"><a href = "../panier.php"> Mon panier </a></li>
<?php 
if (empty($_SESSION['Login'])) {
    echo "<li class=\"bouton_droite\"><a href = \"../connexion.php\"> Connexion </a></li>";
} else echo "<li class=\"bouton_droite\"><a href = \"../Deconnexion.php\"> Deconnexion </a></li>"; ?>

</ul>
</nav>
