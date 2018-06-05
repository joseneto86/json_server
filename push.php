<?php

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AAAAU6TNbfg:APA91bEAxvXeLRRKm61CKgevj6NNOx5CUIRXl1s4zxODBxx5bFNZMqM0bezM1goe_8NczXG8zmUtRkrNylKwaXodFPxSWEHU2WXBuBw0a3dAZAyoqEzTe-P9SOvAm7-4tWGKBxLZlCYz' );


$registrationIds = array( 'eK3rAZ8oxyo:APA91bGPVUxHl1R6dS8KEW6Fhx0PhkWDIVzt649ZknfnU05m9p_OBwJQ_yn3eihNiJFsD0pQhCDqvS0oN-yV1z-jpQX76DwOzXiZNiqSYXx9v0aHmOTuorCyr4BO_IuBdU2oDXU_Dr_n' );

// prep the bundle
$msg = array
(
	'message' 	=> 'pode Usar data',
	'title'		=> 'Mensgem do PHP',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'johnson' => 'legal',
	"natan" => "meu filho",
	'smallIcon'	=> 'small_icon'
);
$notification = array(
	"sound"=> "simpleSound.wav",
    "badge"=> "6",
    "title"=> "PARA ROBSON",
    "icon"=> "myicon",
    "body"=> "Aqui vai um teste",
	
    "notification_id" => "1140",
    "notification_type" => 1,
    "notification_message" => "TEST MESSAGE",
    "notification_title" => "APP"
);
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg,
	'notification' => $notification
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;