<?php include('/includes/head.inc.php'); ?>
	<title>formulaires</title>
	</head> 
    <?php include('/includes/menu.inc.php'); ?>
    
<h1>Formulaire (addition)</h1>
<h4><table style=\"width:100%\">

<h3>Méthode GET</h3>
<form method="get">
    Nombre 1: <input type="text" name="n1" /><br />
    Nombre 2: <input type="text" name="n2" /><br /><br />
    <input type="submit" value="Additioner!" /><br /><br />
</form>

<?php
if (!empty($_GET["n1"]) && !empty($_GET["n2"])) {
    $res = $_GET["n1"] + $_GET["n2"];
    echo "Résultat : ";
    echo "$res";
} else {
    if (empty($_GET["n1"]) && empty($_GET["n2"])) {
        echo "écrivez des chiffres dans toutes les cases !";
    } else if (empty($_GET["n1"])) {
        if ($_GET["n1"] == 0) {
            $res = $_GET["n2"];
            echo "Résultat : ";
            echo "$res";
        } else {
            echo "écrivez des chiffres dans toutes les cases !";
        }
    } else if (empty($_GET["n2"])) {
        if ($_GET["n2"] == 0) {
            $res = $_GET["n1"];
            echo "Résultat : ";
            echo "$res";
        } else {
            echo "écrivez des chiffres dans les cases !";
        }
    } else {
        echo "écrivez des chiffres dans les cases !";
    }
}
?>

<br />
<h3>Méthode POST</h3>

<form method="post">
    Nombre 1: <input type="text" name="n3" /><br />
    Nombre 2: <input type="text" name="n4" /><br /><br />
    <input type="submit" value="Additioner!" /><br /><br />
</form>

<?php
if (!empty($_POST["n3"]) && !empty($_POST["n4"])) {
    $res = $_POST["n3"] + $_POST["n4"];
    echo "Résultat : ";
    echo "$res";
} else {
    if (empty($_GET["n1"]) && empty($_GET["n2"])) {
        echo "écrivez des chiffres dans toutes les cases !";
    } else if (empty($_GET["n3"])) {
        if ($_POST["n3"] == 0) {
            $res = $_POST["n4"];
            echo "Résultat : ";
            echo "$res";
        } else {
            echo "écrivez des chiffres dans les cases !";
        }
    } else if (empty($_GET["n4"])) {
        if ($_POST["n4"] == 0) {
            $res = $_POST["n3"];
            echo "Résultat : ";
            echo "$res";
        } else {
            echo "écrivez des chiffres dans les cases !";
        }
    } else {
        echo "écrivez des chiffres dans les cases !";
    }
}
?>