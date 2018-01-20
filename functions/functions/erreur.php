<?php 

function erreur($err='') {
    include('/includes/head.inc.php'); ?>
    <title>Accueil</title>
    </head> 
	<?php include('/includes/menu.inc.php'); ?>
	<div class="container-fluid"> <?php 
    $mess=($err!='')? $err: 'Une erreur inconnue s\'est produite';
    exit('<p>'.$mess.'</p>
    <p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'accueil</p></div></body></html>');
}

?>