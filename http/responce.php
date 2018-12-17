<?php

function json_response($status,$status_message,$data) {
  header("Content-Type:application/json");
	header("HTTP/1.1 ".$status);

	$response = array(
		'status' => $status,
		'status_message' => $status_message,
		'data' => $data
	);

	$json_response = json_encode($response);
	echo $json_response;
}