<?php
    require('/functions/valide.php');
    include('includes/identifiants.php');
    include('/includes/head.inc.php'); ?>
    <title>connexion</title>
  </head><?php
  include('/includes/menu.inc.php'); 

      $message='';

      /* on récupère l'adresse précédente de celle du formulaire */
      $url = $_REQUEST['url'];

      /* si on oublie un champ dans le formulaire de connexion, un message d'erreur apparait */
      if (empty($_REQUEST['Login']) || empty($_REQUEST['Password']) ) 
      {
          $message = '<p>une erreur s\'est produite pendant votre identification.
          Vous devez remplir tous les champs</p>
          <p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
      } 
      else {
      /* Sachant que le Login est rempli dans le formulaire, on peut remplir $login avec la variable du formulaire */
      $login = $_REQUEST['Login'];

      /* on prépare une requête récupérant tous les champs correspondant à l'abonné */
      $rep = $pdo->prepare('SELECT * FROM Abonné WHERE Login= :log');
      $rep->execute(array(
          'log' => $login));

      /* on récupère la ligne avec les informations */
      $data = $rep->fetch();

      /* on vérifie que le mot de passe est bon */
          if ($data['Password'] == $_REQUEST['Password']) {
              /* si l'utilisateur a cliqué sur se souvenir, on stock ses variables de session dans un cookie */
              if (isset($_REQUEST['souvenir'])) {
                  $expire = time() + 365*24*3600;
                  setcookie('Login', $_SESSION['Login'], $expire);
              }
              /* on démarre la session, on attribue les variables de session et on affiche un message bienveillant */
              session_start();
              $_SESSION['Login'] = $data['Login'];
              $message = '<p>Bienvenue '.$data['Login'].', 
                          vous êtes maintenant connecté!</p>
                          <p>Cliquez <a href="' . $url . '">ici</a> 
                          pour revenir à la page précédente</p>';  
          } else {
              $message = '<p>Une erreur s\'est produite 
              pendant votre identification.<br /> Le mot de passe ou le pseudo 
                  entré n\'est pas correct.</p><p>Cliquez <a href="'. $url . '">ici</a> 
              pour revenir à la page précédente';
          }
          /* on n'oublie pas de fermer la requete préparée pour qu'elle soit réutilisable */
          $rep->CloseCursor();
      }
      echo $message.'</div></body></html>';
  ?>
  <body></body>
</html>
