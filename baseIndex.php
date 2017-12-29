<?php include('/includes/head.inc.php'); ?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>base de données</title>
  </head><?php include('/includes/menu.inc.php'); ?>
  <body>
    <h1>Base de données</h1>
    <div class="navbar">
      <ul>
        <li>
          <a href = "baseIndex.php">Acceuil</a>
        </li>
        <li class="dropdown">
          <a href="#listeAlpha" class="dropbtn">Liste alphabétique</a>
		  <div class="dropdown-content">
			  <a href="compositeur">Compositeurs</a>
			  <a href="interprete">Interprètes</a>
			  <a href="chef">Chefs d'orchestre</a>
			  <a href="orchestre">Orchestres</a>
			</div>
        </li>
        <li class="dropdown">
          <a href="#epoque" class="dropbtn">Par époques</a>
		  <div class="dropdown-content">
			  <a href="compositeur">Compositeurs</a>
			  <a href="interprete">Interprètes</a>
			</div>
        </li>
        <li>
          <a href="#instrument">Instruments</a>
        </li>
		<li>
          <a href="#genre">Genres</a>
        </li>
      </ul>
    </div>
    <div style="margin-left:25%">
      <p>Le site Classique donne accès à 9129 enregistements issues de 445 albums, associées à 2131 oeuvres de 254 compositeurs
      interprétés par 370 interprètes différents. Chaque enregistrement comporte un bref extrait musical, tous les albums ont
      leur pochette et des photos sont disponibles pour la plupart des musiciens.</p>
    </div>
    <ul>
      <li>Par compositeur
      <ul>
        <li>Par initiale</li>
        <li>Par époque</li>
      </ul></li>
      <li>Par interprète
      <ul>
        <li>Par initiale</li>
        <li>Par époque</li>
      </ul></li>
      <li>Par chef</li>
      <li>Par orchestre</li>
      <li>Par instrument</li>
      <li>Par genre</li>
    </ul>
  </body>
</html>
