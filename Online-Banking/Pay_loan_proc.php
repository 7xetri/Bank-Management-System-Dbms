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
?>
<?php
$customer_id = $_SESSION['Customer_Id'];
$branch = $_SESSION['branch_name'];
$amount = $_SESSION['amount'];
$Pin1 = $_POST['pin'];
$Pin2 = $_SESSION['pin'];
$remark = $_POST['remark'];
include 'db_connect.php';
if($amount==0){
    echo '<script>alert("No loan to pay!!")</script>';
}
else{
if($Pin1!=$Pin2){
    echo '<script>alert("Incorrect Pin.!!")</script>';
}
else{
    $sql4="SELECT * FROM account WHERE Customer_Id='$customer_id' ";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_assoc();
    $balance = $row4['balance'];

    if($balance<$amount){
        echo '<script>alert("You do not have enough balance.!!")</script>';
    }
    else{
    $sql="SELECT * FROM borrower where Customer_Id='$customer_id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $loan_number = $row['loan_number'];

    $sql1="DELETE FROM borrower where Customer_Id='$customer_id' ";
    $conn->query($sql1);
    $conn->commit();

    $sql2="DELETE FROM loan where loan_number='$loan_number' ";
    $conn->query($sql2);
    $conn->commit();

    $sql3="SELECT *FROM branch WHERE branch_name='$branch' ";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();
    $assets = $row3['assets'];

    $newassets = $assets + $amount;
    $newbalance = $balance - $amount;

    $sql5 ="UPDATE account SET balance='$newbalance' where Customer_Id='$customer_id' ";
    $conn->query($sql5);
    $conn->commit();

    $sql6 ="UPDATE branch SET assets='$newassets' where branch_name='$branch' ";
    $conn->query($sql6);
    $conn->commit();
    
    $transac=rand(100000,999999);
    $sql7="INSERT INTO recordbook_$customer_id(`Customer_Id`,`transaction_id`,
    `Cr_amount`,`Dr_amount`,`Net_Balance`,`Remark`)
    value('$customer_id','$transac',0,'$amount','$newbalance','$remark')";
    $conn->query($sql7);
    $conn->commit();

    echo "<h3>Thank you for clearing loan &#128512;</h3>";

    }    
}
}

?>
<html>
    <head><meta charset="UTF-8"></head>
    <style>
        h3{
            padding-top:10%;
            text-align:center;
            background-color:white;

        }
    </style>
</html>