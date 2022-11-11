<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

if($_SERVER['REQUEST_METHOD'] == "POST"){

	$data = file_get_contents("php://input");

	$data = json_decode($data);

	$email = $data->email;
	$password = $data->password;

	require "../core/functions.php";

	$feedback = loginUser($email, $password);


	if(is_array($feedback)){
		echo json_encode([
			"message" => "You are logged in successfully",
			"code" =>"success",
			"data" => [
				"user" => $feedback,
				"token" => '1234'
			],
			"type" => "login-user"

		]);
	}else{
		
		if($feedback == null){
			echo json_encode([
			"message" => "Login failed. The user does not exist",
			"code" =>"error",
			"data" => [],
			"type" => "login-user"
		]);
	}else{
		echo json_encode([
			"message" => "Login failed: ".$feedback,
			"code" =>"error",
			"data" => [],
			"type" => "login-user"
		]);


	}


	}

	

}