<?php

$__hostname = "localhost";
$__user = "root";
$__password = "root";
$__dbname = "simple_apis";

$_conn = mysqli_connect($__hostname, $__user, $__password, $__dbname) or die("Could not connect");




/**
 * Define tables
 */

// function create_articles_table($_conn){


// 	$query = "CREATE TABLE IF NOT EXISTS `articles`(
// 				`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
// 				`title` VARCHAR(200) NOT NULL,
// 				`summary` VARCHAR(500) NULL,
// 				`content` LONGTEXT NOT NULL, 
// 				`author_id` INT NOT NULL,
// 				`category_id` INT NOT NULL,
// 				`date_created` TIMESTAMP,
// 				`updated` TIMESTAMP NULL

// 		)";

// 	$result = mysqli_query($_conn, $query);

// }

// function create_categories_table($_conn){

// 	$query = "CREATE TABLE IF NOT EXISTS `categories`(
// 				`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
// 				`category_name` VARCHAR(200) NOT NULL,
// 				`category_description` VARCHAR(500) NULL,
// 				`date_created` TIMESTAMP,
// 				`updated` TIMESTAMP NULL

// 		)";

// 	$result = mysqli_query($_conn, $query);
// }

// function create_authors_table($_conn){

// 	$query = "CREATE TABLE IF NOT EXISTS `authors`(
// 				`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
// 				`author_name` VARCHAR(200) NOT NULL,
// 				`author_email` VARCHAR(500) NULL,
// 				`author_phone` VARCHAR(500) NULL,
// 				`author_account_status` BOOLEAN DEFAULT false,
// 				`date_created` TIMESTAMP,
// 				`updated` TIMESTAMP NULL

// 		)";

// 	$result = mysqli_query($_conn, $query);
// }

// function create_tokens_table($_conn){
// 	$query = "CREATE TABLE IF NOT EXISTS `tokens`(
// 				`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
// 				`token` VARCHAR(200) NOT NULL,
// 				`author_id` INT NULL,
// 				`expiry` VARCHAR(200) NULL,
// 				`date_created` TIMESTAMP	      
// 		)";

// 	$result = mysqli_query($_conn, $query);

// 	if(!$result){
// 		echo mysqli_error($_conn);
// 	}

// }






// Articles
// create_articles_table($_conn);

// // // Categories
// create_categories_table($_conn);

// // Authors
// create_authors_table($_conn);

// //Tokens
// create_tokens_table($_conn);


