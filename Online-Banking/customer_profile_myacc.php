

<html>
    <head><title>My Account</title>
    
    <link rel="stylesheet" type="text/css" href="css/customer_profile-myacc.css" />
 <style>
#customer_profile .link1{

background-color: rgba(5, 21, 71,0.4);

}
    </style>
      <?php include 'header.php' ; ?>
	<?php include 'customer_profile_header.php' ?>
	</head>
<?php 

if($_SESSION['customer_login'] == true)
{}	

	else{
    header('location:customer_login.php');
    }

?>
    
    <?php 
        $cust_id= $_SESSION['Customer_Id'];
        include 'db_connect.php'; 
        $sql1="SELECT * FROM account where Customer_ID= '$cust_id' ";
		$result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $current_bal = $row1['balance'];
    
?>

<body>
	<div class="cust_myacc_container">
	
            <br><br>
            <div class="accdet">
                <span class="heading">Account Details</span><br>
                <label>Customer Id : <?php echo $_SESSION['Customer_Id']; ?></label>
                <label>Account Number : <?php echo $row1['account_number']; ?></label>
                 <label>Account Name : <?php echo $_SESSION['customer_name']; ?></label>
                <label>Home City : <?php echo $_SESSION['customer_city']; ?></label>
                <label>Branch : <?php echo $_SESSION['branch_name']; ?></label>

                <label>Available Balance :Rs<?php echo $current_bal; ?></label>
                <label>Mobile No : <?php echo $_SESSION['mobile']; ?></label>
                

				<label>Email Id : <?php echo $_SESSION['email']; ?></label><br><br><br><br>
				<!-- <a href="customer_pass_change.php"><input type="button" name="pass-chng" value="Change Password"></a> -->
            </div>
            
	
        <br>
    </div>

    </body>
    <?php include 'footer.php' ; ?>
</html>