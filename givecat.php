<?php

$client_id = 'your_client_id';

$url = 'https://api.imgur.com/3/gallery/r/lolcats/';
$headers = array("Authorization: Client-ID $client_id");

$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL=> $url,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTPHEADER => $headers,
CURLOPT_RETURNTRANSFER => 1,
));

$json_returned = curl_exec($curl);
curl_close ($curl);


$data = json_decode($json_returned);
$id = $data->data[array_rand($data->data)]->id;


header('Content-Type: application/json');
die(json_encode(array(
'text' => "http://i.imgur.com/$id.jpg"
)));
?>