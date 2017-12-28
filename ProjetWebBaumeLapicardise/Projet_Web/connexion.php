<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
  <title>Connexion</title>
</head>

<h1><a href = "index.php"> Accueil </a></h1></br>
<body>
  <h1>Connexion</h1>
  <form method="post" action="Traite_Connexion.php?url=<?php echo $_REQUEST["url"];?>">
    Nom : <input name="Login" type="text" /><br/>
    Mot de passe : <input name="Password" type="text" /><br/>
    <input name="Connect" type="submit" value="Connecter" />
  </form>
</body>
</html>
