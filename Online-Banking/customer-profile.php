<?php 
include 'header.php' ;
include 'customer_profile_header.php';
if($_SESSION['customer_login'] == FALSE)
{
	 header('location:customer-login.php');
}
?>
<html>
 <head><title>My Profile</title>
 <link rel="stylesheet" type="text/css" href="css/customer-profile.css" />
</head>
<body>


<?php 
        $cust_id= $_SESSION['Customer_Id'];
        include 'db_connect.php'; 
        $sql="SELECT * FROM account where Customer_Id= '$cust_id' ";
		$result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $current_bal = $row['balance'];
        $sql1="SELECT *FROM borrower where Customer_Id= '$cust_id'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        if($row1!=0)
        {$lonum = $row1['loan_number'];
         $sql2="SELECT *FROM loan where loan_number='$lonum' ";
         $result2 = $conn->query($sql2);
         $row2 = $result2->fetch_assoc();
         $lonamt=$row2['amount']; }
        else
            {$lonamt = 0.00;}
         $_SESSION['amount'] = $lonamt;        
?>

    <div class="cust_profile_container">
            <div class="acc_details">
                <span class="heading">Account Details</span><br>
                <label>Customer Id : <?php echo $_SESSION['Customer_Id']; ?></label>
                <label>Account Number : <?php echo $row['account_number']; ?></label>
                 <label>Account Name : <?php echo $_SESSION['customer_name']; ?></label>
                <label>Available Balance : Rs&nbsp;<?php echo $current_bal ; ?></label>
                <label>Loan Pending : Rs&nbsp;<?php echo $lonamt ; ?></label>

            </div>
            </div>
   
                </table>
    </div>
</div>

</body>
<?php include 'footer.php' ; ?>
</html>


