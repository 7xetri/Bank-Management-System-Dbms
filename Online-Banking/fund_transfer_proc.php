<?php
session_start();
// error_reporting(0);?>
<?php
include 'header.php';
include 'customer_profile_header.php' ;

$customer_id1 = $_SESSION['Customer_Id'];
$Pin1 = $_SESSION['pin'];
$account_no2 = $_POST['account_no'];
$amount = $_POST['amount'];
$Pin2 = $_POST['pin'];
$remark =$_POST['remark'];
include 'db_connect.php';
$sql0="SELECT * FROM account where Customer_Id='$customer_id1' ";
$result0 = $conn->query($sql0);
$row0 = $result0->fetch_assoc();
$account_num = $row0['account_number'];
if($account_num==$account_no2)
{
    echo '<script>alert("You can not tranfer money to self account!!")</script>';
}
else{
$sql="SELECT * FROM account where account_number= '$account_no2' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($row==0){
    echo '<script>alert("Incorrect Account Number.")</script>';
    echo "<h3>Transaction Fail. !!!</h3>";
}
else{   
       if($Pin1!=$Pin2){
        echo '<script>alert("Incorrect Pin Code")</script>';
       }
       else{
        $customer_id2=$row['Customer_Id'];
        $balance2=$row['balance'];

        $sql3="SELECT * FROM account where Customer_Id= '$customer_id1' ";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch_assoc();
        $balance3=$row3['balance'];
        if($balance3<$amount){
            echo '<script>alert("You donot have enough balance.")</script>';
            echo "<h3>Transaction Fail. !!!</h3>";
        }
         else{   
        $newbalance2 = $balance2 + $amount;
        $sql2="UPDATE account SET balance='$newbalance2' where Customer_Id='$customer_id2' ";
        $conn->query($sql2);
        $conn->commit();
        $newbalance3 = $balance3 - $amount;
        $sql4="UPDATE account SET balance='$newbalance3' where Customer_Id= '$customer_id1' ";
        $conn->query($sql4);
        $conn->commit();
        $transac=rand(10000,999999); 
        $sql5="INSERT INTO recordbook_$customer_id1(`Customer_Id`,`transaction_id`,
                            `Cr_amount`,`Dr_amount`,`Net_Balance`,`Remark`)
                value('$customer_id1','$transac',0,'$amount','$newbalance3','$remark')";
        $conn->query($sql5);
        $conn->commit();

        $sql6="INSERT INTO recordbook_$customer_id2(`Customer_Id`,`transaction_id`,
                           `Cr_amount`,`Dr_amount`,`Net_Balance`,`Remark`)
            value('$customer_id2','$transac','$amount',0,'$newbalance2','$remark')";
        $conn->query($sql6);
        $conn->commit();
        echo "<h3>Transaction successfully...</h3>";
        }}
        
        
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