<?php 

function erreur($err='') { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
  xml:lang="fr" lang="fr">
<head>
<link rel="stylesheet" href="styles/style.css" />
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<?php 
$PseudoUser=(isset($_SESSION['Login']))?$_SESSION['Login']:'';?>
    <title>Accueil</title>
    </head> 
	<?php include('/includes/menu.inc.php'); ?>
	<div class="container-fluid"> <?php
    $mess=($err!='')? $err: 'Une erreur inconnue s\'est produite';
    exit('<p>'.$mess.'</p>
    <p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'accueil</p></div></body></html>');
}

?>