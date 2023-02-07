<?php
ob_start();
include 'header.php';
include 'customer_profile_header.php' ;
if($_SESSION['customer_login'] != true){

	header('location:customer_login.php');
	return 0;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan</title>
    <link rel="stylesheet" type="text/css" href="css/fund-transfer.css"/>
    <style>
#customer_profile .link5{

background-color: rgba(5, 21, 71,0.4);

}
    </style>
</head>
<body>
<div class="fundtransfer_conainer">
   
   <br>
   <span><h3>Request Loan</h3></span><br><br>
   <span>*Note:You can only request loan 150% of your current balance.</span>
   <div class="fund_transfer">
               <br>
               <form action="Loan_proc.php" method="post">
               <input type="number" name="loan" placeholder="Loan Amount" required>
               <input type="number" name="pin" placeholder="Pin" required>
               <input type="text" name="remark" placeholder="Purpose of loan" required>
               <br>
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
<br>
</html>
//
//