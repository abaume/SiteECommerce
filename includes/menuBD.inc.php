<?php 
 session_start(); ?>

<ul id="menu_horizontal">
<li class="bouton_gauche"><a href = "../index.php"> Acceuil </a></li>
<li class="bouton_gauche"><a href = "../apropos.php"> A propos </a></li>
<li class="bouton_gauche"><a href = "baseIndex.php"> Contenu BD </a></li>
<li class="bouton_droite"><a href = "../panier.php"> Mon panier </a></li>
<?php 
if (empty($_SESSION['Login'])) {
    echo "<li class=\"bouton_droite\"><a href = \"../connexion.php\"> Connexion </a></li>";
} else echo "<li class=\"bouton_droite\"><a href = \"../Deconnexion.php\"> Deconnexion </a></li>"; ?>

</ul>
</nav>

<input type="hidden" name="page" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />

<?php 

if (isset ($_COOKIE['Login']) && empty($id)) {
    $_SESSION['Login'] = $_COOKIE['Login'];
}

if (!empty($_SESSION['Login'])) {
    echo "Vous êtes connecté en tant que " . $_SESSION['Login'] . "<br />";
} else {
    echo "Vous n'êtes pas connecté <br />";
}

?>