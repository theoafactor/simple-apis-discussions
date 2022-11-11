<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, UPDATE, DELETE");
header("Access-Control-Allow-Headers: Content-Type");


if($_SERVER['REQUEST_METHOD'] == "POST"){

	$data = file_get_contents("php://input");


	$data = json_decode($data);


	require "../database/db.php";



	echo json_encode([
		"message" => "This is working fine",
		"data" => $data

	]);

	//check if the user exists 
// 	$check_result = checkUserExists('username', $data->username);

// 	echo json_encode([
// 		"message" => "works",
// 		"data" => $check_result
// 	]);


// }


// function checkUserExists($param = "email", $data){

// 	if($param === "email"){
// 		$query = "SELECT * FROM `users` WHERE `email`='${data}' LIMIT 1";
// 	}else{
// 		$query = "SELECT * FROM `users` WHERE `username`='${data}' LIMIT 1";
// 	}

// 	$result = mysqli_query($_conn, $query);

// 	if($result){
// 		//the query ran..
// 		return "yes";
// 	}else{
// 		//the query did not run
// 		return "no";
// 	}






}