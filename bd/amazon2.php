<?php

// Region code and Product ASIN
$response = getAmazonPrice("fr", "B00KQPGRRE");
echo $response;

function getAmazonPrice($region, $asin) {

	$xml = aws_signed_request($region, array(
		"Operation" => "ItemLookup",
		"ItemId" => $asin,
		"IncludeReviewsSummary" => False,
		"ResponseGroup" => "Medium,OfferSummary",
	));

	$item = $xml->Items->Item;
	$title = htmlentities((string) $item->ItemAttributes->Title);
	$url = htmlentities((string) $item->DetailPageURL);
	$image = htmlentities((string) $item->MediumImage->URL);
	$price = htmlentities((string) $item->OfferSummary->LowestNewPrice->Amount);
	$code = htmlentities((string) $item->OfferSummary->LowestNewPrice->CurrencyCode);
	$qty = htmlentities((string) $item->OfferSummary->TotalNew);

	if ($qty !== "0") {
		$response = array(
			"code" => $code,
			"price" => number_format((float) ($price / 100), 2, '.', ''),
			"image" => $image,
			"url" => $url,
			"title" => $title
		);
	}

	return $response;
}

function getPage($url) {

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	$html = curl_exec($curl);
	curl_close($curl);
	return $html;
}

function aws_signed_request($region, $params) {

	$public_key = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApu9nL3uCK9IF1Wkf/Tn9
arluzimSZ0WjXB+CIHh8G5k3uu0ZNGIxaHP8o33wW5pC+fZfGjU1nByXKu83QfUq
R683kAoYa76q5BJ60eP0fjMUqChcAlpYvJR6qrXWmH/Vmth44ElS+BBq0WL1RacO
YrCWFwWtcjMiuh2+/5fo8Xf2/DenUE1czhROzuKc9jjWpfwANe25t2GPK7veqzAU
s2x/yj9/o8O24cL4QJD180NaV9osdR9JPdatx6imINTsy7/QrMjUIVmusubO2gpM
GSiFBtsFg+zec1Vmx/cGt58EyNopDZyW8yzt9AnKqFstXN/gT3Vf53OQ3KCQd6VL
CwIDAQAB";
	$private_key = "MIIEogIBAAKCAQEApu9nL3uCK9IF1Wkf/Tn9arluzimSZ0WjXB+CIHh8G5k3uu0Z
NGIxaHP8o33wW5pC+fZfGjU1nByXKu83QfUqR683kAoYa76q5BJ60eP0fjMUqChc
AlpYvJR6qrXWmH/Vmth44ElS+BBq0WL1RacOYrCWFwWtcjMiuh2+/5fo8Xf2/Den
UE1czhROzuKc9jjWpfwANe25t2GPK7veqzAUs2x/yj9/o8O24cL4QJD180NaV9os
dR9JPdatx6imINTsy7/QrMjUIVmusubO2gpMGSiFBtsFg+zec1Vmx/cGt58EyNop
DZyW8yzt9AnKqFstXN/gT3Vf53OQ3KCQd6VLCwIDAQABAoIBAE7liwEYAHexdWxd
mO7Xf3v3U/VAFJ+WfBTIF3o9N3rbuUkxUd4+IlfZqaejl/vTNqBo3p3GVCYKJS/3
i0gzFN54Y2xCOTSDEsVkLoQQlrcmcTbgjEvYY2QNUMRp2JiOomfis45dWUdAixuX
B5D52YSvLOCIoGb+4ATSlji6lS+521Q/b/LEAkqTQSwtQFemYbhrAsRSDXyzNS7+
QQIuGG0bwWeTUrKd6CF42PlpNrxNE71LEowGAh8HU5UkjuUibGqRjVMvw8RcHP1s
hc+tqxKP73Fh3aFTitBKN7HtueA8O8+FoUNV6UyBu+7WgxVBj1tFVR7Z7Aoz56OZ
YhpAAZECgYEA8Uh+M6ZGlrIUGjt1YkuyzLC6OrvbCpVhWiu2Bj4UghgM94ZJiG72
hM/oHJwzni0sJsSSzqU6oUpItKnPTRO5wiwWEST9B1PK4UoLwAbvJbaIGPrcZojv
qmqvsV9yh4wb0YR2bdGZkJPAZVkSF4g0W8Ilnqv+yveJsoq8eZj36c8CgYEAsR4B
hV25cBUcjnAITywhGG6D0MF+CA7WOMim6eUSwdb2WQMCKZtQyODE734QJYbQu9hz
OMrY0cOBpzkfUaoyPv85JZBh95TgoZen+FNd154xQgAMlJs0YRRTUsGNik++zpn8
i3Av8rtOPz2RxsPgOwrYRYnAHcm2k8HXFSuXJgUCgYB1YptjbWWyMvjsujillcZr
Jx+zK2mpgHtYbyOjbdh0YlcMpVxo7/MnMi7unF/QeJGeWsxBlMktZwJwQp0EFrCs
8t3ZgXFIe0+cw3Vr+vOmGWOlI4bOq5hOBJFtbc4+e7+c8yDa1LotSHS12dufbzhp
286Jn4vaGwv2vOBtGCqkqQKBgHg98rJj6pyY+IYKsNlvEBjSDlMOyU0XJX/vWMG5
bn6CPUQ4sqMkejelwI0GfFe9qr+cNrz7mS7vF3o7YXPDo9D43AcQejHmtIl/t9zy
W+ch0jcIaYIJzAmMDvVDyZ94fAUurTDMvQCBAKIWXn0eRYBP4Ht1BSQz6Otu0WHh
8f8xAoGAIwKm1Ce4LQTjtcEJ639Wm9iMrGfZrJk24o4L8lguWKmpcrHhejGd7KSg
v58PJChaDaJkdJ+KkGzeUN6jaqy8eFehfI63nqyAWRbjWv9F360pBPqMyibaRt4i
614Y2iBU5nECGMBhdUxW99XpWt50EjLJFrSxU2y7oRANaT2FUpg=";

	$method = "GET";
	$host = "ecs.amazonaws." . $region;
	$host = "webservices.amazon." . $region;
	$uri = "/onca/xml";

	$params["Service"] = "AWSECommerceService";
	$params["AssociateTag"] = "lapirom-21"; // Put your Affiliate Code here
	$params["AWSAccessKeyId"] = $public_key;
	$params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");
	$params["Version"] = "2011-08-01";

	ksort($params);

	$canonicalized_query = array();
	foreach ($params as $param => $value) {
		$param = str_replace("%7E", "~", rawurlencode($param));
		$value = str_replace("%7E", "~", rawurlencode($value));
		$canonicalized_query[] = $param . "=" . $value;
	}

	$canonicalized_query = implode("&", $canonicalized_query);

	$string_to_sign = $method . "\n" . $host . "\n" . $uri . "\n" . $canonicalized_query;
	$signature = base64_encode(hash_hmac("sha256", $string_to_sign, $private_key, True));
	$signature = str_replace("%7E", "~", rawurlencode($signature));

	$request = "http://" . $host . $uri . "?" . $canonicalized_query . "&Signature=" . $signature;
	$response = getPage($request);

	var_dump($response);

	$pxml = @simplexml_load_string($response);
	if ($pxml === False) {
		return False;// no xml
	} else {
		return $pxml;
	}
}

?>