<?php

$host = "localhost";
$username = "root";
$password = "";
$db_name = "users_database";

$conn = new mysqli($host, $username, $password, $db_name);

if($conn->connect_error){
	echo "Ошибка подключения к базе данных.";
	exit();
}

?>