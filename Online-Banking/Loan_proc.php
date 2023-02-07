<?php
session_start();
error_reporting(0);
?>
<?php
include 'header.php';
include 'customer_profile_header.php' ;
$customer_id = $_SESSION['Customer_Id'];
$branch = $_SESSION['branch_name'];
$pin1=$_POST['pin'];
$pin2=$_SESSION['pin'];
$loan_amount = $_POST['loan'];
$remark=$_POST['remark'];
include 'db_connect.php';
if($pin1!=$pin2){
    echo '<script>alert("Incorrect Pin code.!!")</script>';
}
else{
$sql="SELECT * FROM account where Customer_Id= '$customer_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$balance=$row['balance'];
if($loan_amount>1.5*$balance){
    echo '<script>alert("Loan request Rejected.!!")</script>';
            echo "<h3>Loan Request rejected !!! You can only get loan
                   amount equal or less than 150% of your current balance. </h3>";
}
else{
    $sql2="SELECT * FROM branch WHERE branch_name ='$branch' ";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $assets = $row2['assets'];
    $newbalance = $balance + $loan_amount;
    $newassets = $assets - $loan_amount;

    $loan_num = rand(1000,10000);
    $lon="INSERT INTO loan(`loan_number`,`branch_name`,`amount`) 
                      value('$loan_num','$branch','$loan_amount')";
    $conn->query($lon);
    $conn->commit();

    $bur="INSERT INTO borrower(`Customer_Id`,`loan_number`)
                      value('$customer_id','$loan_num') ";
    $conn->query($bur);
    $conn->commit();
    
    $acct= "UPDATE account SET balance='$newbalance' where Customer_Id='$customer_id'";
    $conn->query($acct);
    $conn->commit();
    $brch= "UPDATE branch SET assets='$newassets' where branch_name='$branch'";
   $conn->query($brch);
    $conn->commit();
    $transac=rand(100000,999999);
    $sql="INSERT INTO recordbook_$customer_id(`Customer_Id`,`transaction_id`,
    `Cr_amount`,`Dr_amount`,`Net_Balance`,`Remark`)
    value('$customer_id','$transac','$loan_amount',0,'$newbalance','$remark')";
    $conn->query($sql);
    $conn->commit();
    echo "<h3>Loan amount is added to your account. !!!</h3>";
}
}
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