<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

if($_SERVER['REQUEST_METHOD'] == "POST"){

	$data = file_get_contents("php://input");

	$data = json_decode($data);

	$title = $data->title;
	
	$summary = null;
	if(isset($data->summary)){
		$summary = $data->summary;
	}

	$content = $data->content;
	$category_id = (int)$data->category_id;

	$key = $data->token;

	require_once "../core/functions.php";
	
	//validate the key
	$feedback = json_encode(validate_key($key));



	$feedback = json_decode($feedback);

	// echo json_encode($feedback);
	$result = create_article($title, $summary, $content, 1, $feedback->user->id);

	echo json_encode($result);



}


