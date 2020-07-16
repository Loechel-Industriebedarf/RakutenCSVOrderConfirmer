<?php	
	$file = fopen('rakutentracking.csv', 'r');
	$baseurl = 'http://webservice.rakuten.de/merchants/orders/setOrderShipped?key=INPUT_API_KEY_HERE';
	while (($line = fgetcsv($file, 0, ";")) !== FALSE) {
		$apiurl = $baseurl . '&order_no=' . $line[0] . '&carrier=' . $line[1] . '&tracking_number=' . $line[2];
	   
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $apiurl); //Add url to curl	
		$response = curl_exec($curl); //Call url via curl
			
		var_dump($response); //Show response
		echo ' | ' . $line[0] . ' ' . $line[1] . ' ' . $line[2];
		echo "<br>";
	}
	
	fclose($file);
?>