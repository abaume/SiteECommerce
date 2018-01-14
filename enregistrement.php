<?php include('/includes/head.inc.php'); ?>
<title>connexion</title>
</head> 
<?php include('/includes/menu.inc.php'); ?>
<?php
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

if ($id !=0) erreur(ERR_IS_CO);

$url = $_SERVER["REQUEST_URI"];

if (empty($_POST['pseudo'])) {
    ?>
    <h1>Inscription</h1>
    <form method="post" action="Traite_Enregistrement.php?url=<?php echo $url?>">
    <fieldset> 
        <legend> Identifiants </legend> 
        <label for="Login"> *Pseudo :</label> <input name="Login" type ="text" id="Login"/> <br/>
        <label for="Password"> *Mot de Passe :</label> <input name="Password" type="password" id="Password" /> <br/> 
    </fieldset> 
    <fieldset> 
        <legend> Personnel </legend> 
        <label for="Nom"> Nom :</label> <input name="Nom" type ="text" id="Nom"/> <br/> 
    </fieldset> 
    <fieldset> 
        <legend> Coordonnées </legend> 
        <label for="adresse"> Adresse :</label> <input name="adresse" type ="text" id="adresse"/> <br/>
        <label for="mail"> Adresse mail :</label> <input name="mail" type ="text" id="mail"/> <br/>
        <label for="telephone"> Téléphone :</label> <input name="telephone" id="telephone" type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"/> <br/> 
    </fieldset> 
<p> Les champs précédés d'un * sont obligatoires</p> 
<p> <input type="submit" value="S'inscrire" /> </p> </form>
<label> Se souvenir de moi ?</label><input type="checkbox" name ="souvenir"/><br />
</div>
        <?php
}
?>
</body>
</html> 
