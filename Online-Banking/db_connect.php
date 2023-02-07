<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $database,8111);

// Check connection
if ($conn->connect_error) {
	header('location:server_down.php');
} 
else{
	// echo "Connection Established";
}

?>