<?php

$ch = curl_init();

$data_array = array(
    "firstName" => "Jonathan" ,
    "lastName"=> "Calderon" 
);

$data = http_build_query($data_array);

$header = array(
    'x-api-key: TEKAMBI01234'
);

$url = "https://staging.digitaljobler.com/assessment/submit";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$resp = curl_exec($ch);

if($e = curl_error($ch)) {
    echo $e;
} 
else {
    echo($resp);
}

curl_close($ch);