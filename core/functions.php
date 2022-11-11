<?php

function checkTokenExists($user_id){
	require "../database/db.php";

	$query = "SELECT * FROM `tokens` WHERE `author_id`=$user_id LIMIT 1";

	$result = mysqli_query($_conn, $query);

	if($result){
		if(mysqli_num_rows($result) == 1){
			return true;
		}else{
			return false;
		}
	}else{
		//the query did not run

	}
}

function generateUserToken($user_id){
		$unqiue_id = uniqid("s-api-".$user_id, TRUE);

		//save to the tokens table
		require "../database/db.php";

		//check if this user with user_id has a token already
		$check_result = checkTokenExists($user_id);

		$user_id = (int)$user_id;

		if($check_result == true){
			//update the token with the new one
			$query = "UPDATE `tokens` SET `token`='$unqiue_id' WHERE `author_id`=$user_id";
		}else{
			$query = "INSERT INTO `tokens` (`token`, `author_id`, `expiry`, `date_created`) VALUES('$unqiue_id', $user_id, NULL, NOW())";
		}

		$result = mysqli_query($_conn, $query);
		if($result){
			return $unqiue_id;
		}else{
			return null;
		}


}


function loginUser($email, $password){
	//bring in the database 
	require "../database/db.php";

	$email = mysqli_real_escape_string($_conn, trim($email));

	$password = mysqli_real_escape_string($_conn, trim($password));


	$query = "SELECT * FROM `authors` WHERE `author_email`='$email' AND `author_password`='$password'";

	$result = mysqli_query($_conn, $query);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			//generate the token for this user
			$token = generateUserToken($row['id']);

			return [
				"data" => $row,
				"token" => $token
			];
		}else{
			return null;
		}

	

	}else{
		//the query failed.
		return mysqli_error($_conn);

	}



}

function create_article($title, $summary, $content, $category_id, $user_id){
	require "../database/db.php";

	$query = "INSERT INTO `articles`(`title`, `summary`, `content`, `author_id`, `category_id`, `date_created`) VALUES('$title', '$summary', '$content
		', $user_id, $category_id, NOW())";

	$result = mysqli_query($_conn, $query);

	if($result){
		return [
			"message" => "article created",
			"code" => "success",
			"data" => null,
			"type" => "create-article"
		];
	}else{
		return [
			"message" => "article could not be created",
			"code" => "error",
			"data" => null,
			"type" => "create-article"
		];
	}


}



function validate_key($token){
	require_once "../database/db.php";

	$token = mysqli_real_escape_string($_conn, trim($token));

	$query = "SELECT * FROM `tokens` WHERE `token`='$token' LIMIT 1";

	$result = mysqli_query($_conn, $query);

	if($result){
		if(mysqli_num_rows($result) == 1){
			
			//return the user data
			$token_row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$author_id = $token_row["author_id"];

			$get_user_query = "SELECT * FROM `authors` WHERE `id`=$author_id";
			$get_user_result = mysqli_query($_conn, $get_user_query);

			if($get_user_result){
				$user_row = mysqli_fetch_array($get_user_result, MYSQLI_ASSOC);

				return [
					"token" => $token,
					"user" => $user_row
				];
			}else{
				return [];
			}


		}else{
			return false;
		}
	}else{
		//

	}

}