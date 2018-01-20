<?php include('/includes/head.inc.php'); ?>
    <title>Amazon</title>
    </head> 
	<?php include('/includes/menu.inc.php'); ?>
	<div class="container-fluid">
    <h1>Amazon</h1>
    <p>
	<?php
	require('AmazonECS.class.php'); //nom de la classe téléchargée
    const Aws_ID = "AKIAIOYVUR3AD4CB2ECA"; // Identifiant
    const Aws_SECRET = "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"; //Secret
    const associateTag="lapirom-21"; // AssociateTag
    $client = new AmazonECS(Aws_ID, Aws_SECRET, 'FR', associateTag);
    $category = 'Musique';
    $title = "B00000I433";
    $mode = 'ASIN';
	
	$response;
		$array;
		$review;
		$price;
		$url;
		$image;
		$artist;
		$format;
		$marque;
		$label;
		$date;	
    if($mode == 'ASIN')
    {
		$response = $client->responseGroup('Large')->lookup($title);
		$array = $client->returnData($response);
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
		if(!isset($array["Items"]["Item"]["ItemAttributes"]["Label"])){
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
		if(sizeof($morceaux)>0){
			echo "<h3>Morceaux :</h3><ul>";
			for($i = 0; $i<sizeof($morceaux) ; $i++){
				echo "<li>" . $array["Items"]["Item"]["Tracks"]["Disc"]["Track"][$i]["_"] . "</li>";
			}
			echo "</ul>";
		};		
		if(!empty($review)){
			echo $review . "<br>";
			};
    }
			  
	?>
	</p>
	</div>
  </body>
</html>
