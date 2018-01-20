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