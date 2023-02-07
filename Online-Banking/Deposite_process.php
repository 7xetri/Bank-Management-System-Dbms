<?php
session_start();
error_reporting(0);
include 'header.php';
include 'customer_profile_header.php';
include 'db_connect.php'; 
$cus_id= $_SESSION['Customer_Id']; 
$deposite_amount=$_POST['deposite_amount'];
$remark=$_POST['remark'];
$sql="SELECT * FROM account where Customer_Id= '$cus_id' ";
		$result = $conn->query($sql);
        $row = $result->fetch_assoc();
$account_number =$row['account_number'];
$balance=$row['balance'];
    $acc = "INSERT INTO depositor(`account_number`,`deposite_amount`) 
    value('$account_number','$deposite_amount')";
    $conn->query($acc);
    $conn->commit();
    $newbalance=$balance + $deposite_amount;  
   $acct= "UPDATE account SET balance='$newbalance' where Customer_Id='$cus_id'";
   $conn->query($acct);
    $conn->commit();
    $transac=rand(100000,999999);
    $sql1="INSERT INTO recordbook_$cus_id(`Customer_Id`,`transaction_id`,`Cr_amount`,
                        `Dr_amount`,`Net_Balance`,`Remark`)
            value('$cus_id','$transac','$deposite_amount',0,'$newbalance','$remark')";
    $conn->query($sql1);
    $conn->commit(); 
    echo "<h3>Amount deposited successfully....</h3>";           
?>
<html>
    <style>
        h3{
            padding-top:10%;
            text-align:center;
            background-color:white;

        }
    </style>
</html>