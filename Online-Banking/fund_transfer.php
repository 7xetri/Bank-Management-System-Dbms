<?php
ob_start();
include 'header.php';
include 'customer_profile_header.php' ;
if($_SESSION['customer_login'] != true){

	header('location:customer_login.php');
	return 0;
	}
?>

<html>
<head>
<title>Fund Transfer</title>
<link rel="stylesheet" type="text/css" href="css/fund-transfer.css"/>    
<style>
#customer_profile .link4{

background-color: rgba(5, 21, 71,0.4);

}
    </style>
 </head>
<body>


    <div class="fundtransfer_conainer">
   
        <br>
        <span><h3>24x7 Instant Payment</h3></span><br><br>
		<span>Transfer Money to</span><br>
		
        <div class="fund_transfer">
					<br>
					<form action="fund_transfer_proc.php" method="post">
					<input type="number" name="account_no" placeholder="Account Number" required>
					<input type="number" name="amount" placeholder="Amount" required>
					<input type="number" name="pin" placeholder="Pin Number" required>
					<input type="text" name="remark" placeholder="Remark" required>
					<input type="submit" name="fnd_trns_btn" value="Submit"><br>			
		</form>
    </div>
</div>
<style>
	.fundtransfer_conainer input[type="text"],
  select {
    /* //background-color: cadetblue; */
    padding: 2%;
    width: 60%;
    margin: 1% auto;
    display: block;
  }
</style>
    </body>
</html>
//
// 