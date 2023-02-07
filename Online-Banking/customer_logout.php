<?php 



	session_start();
	
		include 'db_connect.php';
		// Update date & time
		
		$customer_id=$_SESSION['Customer_Id'] ;
		
	
		session_destroy();
		session_unset();

	header('location:customer_login.php');
	
	
?>