<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, UPDATE, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$data = file_get_contents("php://input");
   	
   	$data = json_decode($data);

   	$id = $data->id;
 

   	//save to database
   	require_once "../database/db.php";

   	$id = mysqli_real_escape_string($_conn, trim($id));


   	$author_id = 1;

   	$query = "DELETE FROM `posts` WHERE id=$id LIMIT 1";

   	$result = mysqli_query($_conn, $query);

   	if($result){
	   		echo json_encode([
	   			"message" => "Post deleted successfully!",
	   			"code" => "success",
	   			"data" => []
	   					
	   			]);
   	}else{

   		echo json_encode([
	   			"message" => "Post could not be deleted!: ".mysqli_error($_conn),
	   			"code" => "error",
	   			"data" => []
	   		]);


   	}

   	
}