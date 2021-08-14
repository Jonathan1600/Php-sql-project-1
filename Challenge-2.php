<?php

// all the variables needed to make the curl api call to get the data
$ch = curl_init();
$url = "https://staging.digitaljobler.com/assessment/retrieve";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($ch);

//Main function to convert XML to an Assosiative Array
function xml_to_array($xml) {
    $xml_obj = simplexml_load_string($xml);
    $xml_json = json_encode($xml_obj);
    $xml_arr = json_decode($xml_json, true);
    return($xml_arr);
};

//check if there we any errors with the call
if($e = curl_error($ch)) {
    echo $e;
} 
//if everything was succesful get the XML data and run the function to convert it into an assosiative array
else {
    $xml_arr = xml_to_array($resp); 
    print('<pre>');
    print_r($xml_arr);
}

curl_close($ch);
?>