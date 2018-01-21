<?php include('../includes/headBD.inc.php'); ?>
    <title>base de données</title>
  </head><?php include('../includes/menuBD.inc.php'); ?>
  <body>
    <h1>Base de données</h1><?php include('../includes/navbarBD.inc.php'); ?>
    <div class="texte">
      <h2>Album - détails</h2>
      <p>
        <?php
        include("../includes/identifiants.php");

		//Données Amazon
        require('AmazonECS.class.php'); //nom de la classe téléchargée
            const Aws_ID = "AKIAIOYVUR3AD4CB2ECA"; // Identifiant
            const Aws_SECRET = "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"; //Secret
            const associateTag="lapirom-21"; // AssociateTag

		//si on récupère le code album par la méthode GET
        if (!empty($_GET["code"])) {
                $code = $_GET["code"];
                
                $requete = "Select Album.Titre_Album, Album.Code_Album, Album.ASIN From Album Where Album.Code_Album like '$code'";
                $buffer = $pdo->query($requete);
                $donne = $buffer->fetch();
                        
			//AMAZON			
            $client = new AmazonECS(Aws_ID, Aws_SECRET, 'FR', associateTag);
            $category = 'Musique';    
				//Si on a l'ASIN
                if (!empty($donne['ASIN']))
                {
                        $title = $donne['ASIN'];
                        $mode = 'ASIN';
                }
				//Si on n'a pas l'ASIN
                else{
                        $title =  $donne['Titre_Album'];
                        $mode = 'Item';
                }
				//AVEC ASIN
                if($mode == 'ASIN')
            {   
                        echo "<div class=\"container\"><div class=\"row\"><div class=\"col-sm-6\"><div class=\"amazon\"><h3>Amazon</h3>";
                        $response = $client->responseGroup('Large')->lookup($title);
                        $array = $client->returnData($response);
						//Vérification de l'existence des données et affectation dans les variables 
                        if(isset($array["Items"]["Item"]["EditorialReviews"]["EditorialReview"]["Content"])){
                        $review = $array["Items"]["Item"]["EditorialReviews"]["EditorialReview"]["Content"];
                        }
                        if(isset($array["Items"]["Item"]["OfferSummary"]["LowestNewPrice"]["FormattedPrice"])){
                        $price = $array["Items"]["Item"]["OfferSummary"]["LowestNewPrice"]["FormattedPrice"];
                        }
                        if(isset($array["Items"]["Item"]["DetailPageURL"])){
                        $url = $array["Items"]["Item"]["DetailPageURL"];
                        }
                        if(isset($array["Items"]["Item"]["MediumImage"]["URL"])){
                        $image = $array["Items"]["Item"]["MediumImage"]["URL"];
                        }
                        if(isset($array["Items"]["Item"]["ItemAttributes"]["Artist"])){
                        $artist = $array["Items"]["Item"]["ItemAttributes"]["Artist"];
                        }
                        if(isset($array["Items"]["Item"]["ItemAttributes"]["Brand"])){
                        $marque = $array["Items"]["Item"]["ItemAttributes"]["Brand"];
                        }
                        if(!empty($array["Items"]["Item"]["ItemAttributes"]["Label"])){
                        $label = $array["Items"]["Item"]["ItemAttributes"]["Label"];
                        }
                        if(isset($array["Items"]["Item"]["ItemAttributes"]["ReleaseDate"])){
                        $date = $array["Items"]["Item"]["ItemAttributes"]["ReleaseDate"];
                        }
                        if(isset($array["Items"]["Item"]["ItemAttributes"]["Title"])){
                        $titre = $array["Items"]["Item"]["ItemAttributes"]["Title"];
                        }
                        if(isset($array["Items"]["Item"]["Tracks"]["Disc"]["Track"])){
                        $morceaux = $array["Items"]["Item"]["Tracks"]["Disc"]["Track"];
                        }
                        //Affichage
                        if(!empty($titre)){
                                echo "<h3>" . $titre . "</h3>";
                                };
                        if(!empty($artist)){
                                echo $artist . "<br>";
                                };      
                        if(!empty($price)){
                                echo "<h4>" . $price;
                                };
                        if(!empty($url)){
                                echo "<a href=" . $url . "\" target=\"_blank\"> Lien vers Amazon </a></h3>";
                                };
                        if(!empty($image)){
                                echo "<img src=\"" . $image . "\"><br>";
                                };                              
                        if(!empty($label)){
                                echo $label . "  ";
                                };
                        if(!empty($marque)){
                                echo $marque . "  ";
                                };
                        if(!empty($date)){
                                echo $date . "<br>";
                                };
                        if(!empty($morceaux)){
                                echo "<h3>Morceaux :</h3><ul>";
                                for($i = 0; $i<sizeof($morceaux) ; $i++){
                                        echo "<li>" . $array["Items"]["Item"]["Tracks"]["Disc"]["Track"][$i]["_"] . "</li>";
                                }
                                echo "</ul>";
                        };              
                        if(!empty($review)){
                                echo $review . "<br>";
                                };
                        echo "</div></div>";
            }
			
			//SANS ASIN
                else if($mode == 'Item'){
                        $amazonEcs = new AmazonECS(Aws_ID, Aws_SECRET, 'FR', associateTag);
                        $response = $amazonEcs->category('Music')->responseGroup('Large')->search($title);
                        echo "<div class=\"container\"><div class=\"row\"><div class=\"col-sm-6\"><div class=\"amazon\"><h3>Amazon</h3>
                        L'album recherché n'est pas disponible sur Amazon.
                        <h4>Albums semblables :</h4><ul>";
                        $array = $client->returnData($response);
                        if(isset($array["Items"]["Item"])){
                                $titre = $array["Items"]["Item"];
                        }
                        //print_r ($array["Items"]["Item"][0]);
                        if(!empty($titre)){
                                for($i = 0; $i<sizeof($titre) ; $i++){
                                        echo "<li><a href=\"" . $array["Items"]["Item"][$i]["DetailPageURL"] . "\"target=\"_blank\">" . $array["Items"]["Item"][$i]["ItemAttributes"]["Title"] . "</a></li>";                   
                                }
                                echo "</ul>";
                        }
                        else{
                                echo "Pas d'albums semblables";
                        }
                        echo "</div></div>";
                }
                
				//BD CLASSIQUE_WEB
				//Album
                echo 
                        "<div class=\"col-sm-6\"><h3>BD</h3><h3><form method=\"get\"><img src=\"/Classique/Home/Pochette/" . 
                        $donne['Code_Album'] . "\" alt=\"Photo\" width=\"100\">  " . 
                        $donne['Titre_Album'];
						//Bouton Ajouter si on est connecté
                        if (!empty($_SESSION["Login"])){
                                echo
                                "<span class=\"btn\">
                                <input type=\"hidden\" value=\"" . $code . "\" name=\"ajout\">" .
                                "<input type=\"submit\" value=\"Ajouter\" /> . </span></form></h3>";
                        }                
				//Morceaux
                echo "<h3> Morceaux </h3>";
                
            $requete = "Select Distinct Disque.Code_Disque, Album.ASIN, Enregistrement.Titre, Enregistrement.Durée, Enregistrement.Code_Morceau from Album
                Inner Join Disque On Disque.Code_Album = Album.Code_Album
                Inner Join Composition_Disque On Disque.Code_Disque = Composition_Disque.Code_Disque 
                Inner Join Enregistrement On Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
                Where Album.Code_Album like '$code'";   
                $buffer = $pdo->query($requete);        
                foreach ($pdo->query($requete) as $row) {
                        echo 
                        "<h4>". $row['Titre'] . "</h4>" .
                        "<p><audio src=\"/Classique/Home/Extrait/" . $row['Code_Morceau'] . "\" controls></audio>" .
                        "(" . $row[utf8_decode('Durée')] . ")" . "</p>";
                }
                echo "</div></div></div>";
        }

		//AJOUT AU PANIER
        if (!empty($_GET["ajout"]) && !empty($_SESSION["Login"])) {
                        $codeAlbum = $_GET["ajout"];
                        $login = $_SESSION["Login"];
                        
                        $requete = "SELECT Enregistrement.Code_Morceau from Album
                        Inner Join Disque On Disque.Code_Album = Album.Code_Album
                        Inner Join Composition_Disque On Disque.Code_Disque = Composition_Disque.Code_Disque 
                        Inner Join Enregistrement On Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
                        Where Album.Code_Album Like '$codeAlbum'";
                        
                        $buffer = $pdo->query($requete);
                        $donne = $buffer->fetch();
                
                        $codeEnregistrement = $donne['Code_Morceau'];   
                        
                        $requete = "SELECT Code_Abonné From Abonné Where Login Like '" . $login . "'";                
                        $buffer = $pdo->query($requete);
                        $donne = $buffer->fetch();
                
                        $codeAbonne = $donne[utf8_decode('Code_Abonné')];
                        
                        $requete = "INSERT INTO Achat(Code_Enregistrement, Code_Abonné) 
                                VALUES(" . $codeEnregistrement . "," . $codeAbonne . ")";
                        $buffer = $pdo->query($requete);
                        
                        echo "<h3>Article ajouté à votre panier !</h3>
                        <p><a href=\"../panier.php\">Pour accéder au panier cliquez ici</a></p>
                        <p><a href=\"../index.php\">Pour revenir à l'accueil cliquez ici</a></p> ";
        }
                        $pdo = null;
        ?>
      </p>
    </div>
  </body>
</html>
