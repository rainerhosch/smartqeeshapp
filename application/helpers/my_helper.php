<?php
defined('BASEPATH') or exit('No direct script access allowed');
function kirimNotifikasiTeks($no_telepon = NULL,$message = NULL)
{
	/* Endpoint */
	$url = 'https://eu.wablas.com/api/send-message';

	$curl = curl_init();
	$token = '2IWSs2VgVEp95xGgBsHNr05mht82khyQVeTzu4iHr978kroelDkhcFRmrrH8pQyK';
	$data = [
		'phone' => $no_telepon,
		'message' => $message, 
	];

	curl_setopt($curl, CURLOPT_HTTPHEADER,
		array(
			"Authorization: $token",
		)
	);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	$result = curl_exec($curl);
	curl_close($curl);
}


