<?php  
session_start();  ?>
<?php
include 'db_connect.php';
if(isset($_POST['login-btn'])){

if(isset($_POST['customer_id'])){
    $password = $_POST['password'];
    $customer_id = $_POST['customer_id'];
		$sql="SELECT * FROM registration where Customer_Id ='$customer_id' and password='$password' ";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($customer_id != $row['Customer_Id'] && $password != $row['password']){
			
		echo '<script>alert("Incorrect customer_id/Password.")</script>';
			
		
	}
			
			
		else{
		$_SESSION['customer_login'] = true;
        $_SESSION['Customer_Id'] = $customer_id;
		$_SESSION['customer_name'] = $row['customer_name'];
		$_SESSION['gender'] = $row['gender'];
		$_SESSION['dob'] = $row['dob'];
		$_SESSION['mobile'] = $row['mobile'];
		$_SESSION['email']	= $row['email'];
		$_SESSION['citizenship'] = $row['citizenship'];
		$_SESSION['customer_city']= $row['customer_city'];
		$_SESSION['customer_street'] = $row['customer_street'];
		$_SESSION['branch_name'] =$row['branch_name'];
		$_SESSION['pin'] =$row['pin'];
		date_default_timezone_set('Asia/kathmandu'); 
		$_SESSION['this_login'] = date("d/m/y h:i:s A");

 //SMS Integration to notify customer login----------------------------------

				/*	$mob_no = $row['email'];
					require('textlocal.class.php');
					$apikey = 'Mzie479SxfY-Z7slYf9AI3zVXCAu0G5skUBQVYOfRU';
					$textlocal = new Textlocal(false,false,$apikey);
					$numbers = array($mob_no);
					$sender = 'TXTLCL';
					$ipaddress = $_SERVER['REMOTE_ADDR'];
					$message = 'Hello '.$row['customer_name'].' you just logged in to your Internet banking account IP Address : '.$ipaddress.'';
					

					
						try {
							$result = $textlocal->sendSms($numbers, $message, $sender);
							print_r($result);
						} catch (Exception $e) {
							die('Error: ' . $e->getMessage());
						}  */

	//-------------------------------------------------------------------------
        
		header('location:customer-profile.php');
		
		}

}
}
?>