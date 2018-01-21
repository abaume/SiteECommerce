
<?php if (!empty($_SERVER['HTTP_REFERER'])) {
    echo '<input type="hidden" name="page" value=" ' . $_SERVER['HTTP_REFERER'] . '" />';
}

if (isset ($_COOKIE['Login']) && empty($id)) {
    $_SESSION['Login'] = $_COOKIE['Login'];
}

if (!empty($_SESSION['Login'])) {
    echo '<span class ="connexion">Vous êtes connecté en tant que <i>' . $_SESSION['Login'] . '</i></span><br />';
} else {
    echo "Vous n'êtes pas connecté <br />";
}

?>