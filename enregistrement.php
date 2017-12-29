<?php include('/includes/head.inc.php'); ?>
<title>connexion</title>
</head> 
<?php include('/includes/menu.inc.php'); ?>
<?php
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

session_start();
if ($id !=0) erreur(ERR_IS_CO);

include("./functions/erreur.php");
include("./functions/constant.php");

if (empty($_POST['pseudo'])) {
    ?>
    <h1>Inscription</h1>
    <form method="post" action="enregistrement.php" enctype="multipart/form-data">
    <fieldset> 
        <legend> Identifiants </legend> 
        <label for="pseudo"> *Pseudo :</label> <input name="pseudo" type ="text" id="pseudo"/> <br/>
        <label for="password"> *Mot de Passe :</label> <input name="password" name="password" id="password" /> <br/> 
</fieldset> 
<p> Les champs précédés d'un * sont obligatoires</p> 
<p> <input type="submit" value="S'inscrire" /> </p> </form>
</div>
        <?php
}
?>
</body>
</html> 
