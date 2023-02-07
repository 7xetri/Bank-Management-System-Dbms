<?php
ob_start();
session_start();
error_reporting(0);
include 'header.php';
include 'customer_profile_header.php' ;
if($_SESSION['customer_login'] != true){

	header('location:customer_login.php');
	return 0;
	}
    $lonamt = $_SESSION['amount'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan</title>
    <link rel="stylesheet" type="text/css" href="css/fund-transfer.css"/>
    <style>
#customer_profile .link6{

background-color: rgba(5, 21, 71,0.4);

}
</style>
</head>
<body>
<div class="fundtransfer_conainer">
   
   <br>
   <span><h3>Pay Loan</h3></span><br><br>
   <div class="fund_transfer">
   <label>Loan Pending : Rs&nbsp;<?php echo $lonamt ; ?></label>
               <br><br>
               <form action="Pay_loan_proc.php" method="post">
                <input type="number" name="pin" placeholder="Pin"><br>
                <input type="text" name="remark" placeholder="Remark"><br>
               <input type="submit" name="fnd_trns_btn" value="Pay"><br>			
          </form>
</div>
</div>
</body>
<br>
<style>
    .fund_transfer label {
    border: 1px solid rgba(44, 78, 134, 0.2);
    padding: 8px;
    float: left;
    text-align: left;
    margin: 5px;
    width: 97%;
    font-size: 15px;
  }
  .fundtransfer_conainer input[type="text"],
  select {
    /* //background-color: cadetblue; */
    padding: 2%;
    width: 60%;
    margin: 0.5% auto;
    display: block;
  }

</style>
</html>