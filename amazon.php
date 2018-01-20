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
		$review = $array["Items"]["Item"]["EditorialReviews"]["EditorialReview"]["Content"];
		$price = $array["Items"]["Item"]["OfferSummary"]["LowestNewPrice"]["FormattedPrice"];
		$url = $array["Items"]["Item"]["DetailPageURL"];
		$image = $array["Items"]["Item"]["MediumImage"]["URL"];
		$artist = $array["Items"]["Item"]["ItemAttributes"]["Artist"];
		$format  = $array["Items"]["Item"]["ItemAttributes"]["Format"];
		$marque  = $array["Items"]["Item"]["ItemAttributes"]["Brand"];
		$label  = $array["Items"]["Item"]["ItemAttributes"]["Label"];
		$date  = $array["Items"]["Item"]["ItemAttributes"]["ReleaseDate"];
		echo $review . "<br>" . $price . "<br>" . $url . "<br>" . $image .
		"<br>" . $artist . "<br>" . $format . "<br>" . $marque . "<br>" .
		$label . "<br>" . $date . "<br>";		
        //$items = $response["Items"];
        //$it = $items["Item"];
        //displayItem($it);
    }
			  
	//print_r($response);
	?>
	</p>
	</div>
  </body>
</html>
