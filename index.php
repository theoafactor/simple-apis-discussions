<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: GET, POST");

echo json_encode([
	"message" => "Data received"
]);

