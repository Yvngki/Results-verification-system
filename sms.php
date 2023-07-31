<?php

// Set your Nexmo API credentials
$apiKey = 'd7318bc2';
$apiSecret = 'AQAa1sMXIggKvBqj';

// Set the recipient's phone number and message text
$toNumber = '0964573890';
$message = 'Hello, this is a test message from Rev!';

// Send the SMS using Nexmo's API
$url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
    'api_key' => $apiKey,
    'api_secret' => $apiSecret,
    'to' => $toNumber,
    'text' => $message,
    'from' => 'NEXMO'
]);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Check the response from Nexmo's API
$json = json_decode($response, true);
if ($json['messages'][0]['status'] == 0) {
    echo 'Message sent successfully!';
} else {
    echo 'Message failed with error: ' . $json['messages'][0]['error-text'];
}



?>