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
    if($mode == 'ASIN')
    {
        $response = $client->responseGroup('Large')->lookup($title);
		$des = $client->returnData($response);
		$descr = $des["Items"]["Item"]["EditorialReviews"]["EditorialReview"]["Content"];
		echo $descr . "<br>";
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
