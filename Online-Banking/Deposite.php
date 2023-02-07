<?php include 'header.php';
          include 'customer_profile_header.php';
     ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposite Amount</title>
    <link rel="stylesheet" type="text/css" href="css/Deposite.css"/>
    <style>
#customer_profile .link3{

background-color: rgba(5, 21, 71,0.4);

}
</style>
</head>
<body>
    <?php
       $cust_id= $_SESSION['Customer_Id'];
        include 'db_connect.php'; 
        $sql="SELECT * FROM account where Customer_Id= '$cust_id' ";
		$result = $conn->query($sql);
        $row = $result->fetch_assoc();?>
        <br><br>
    <div class="cust_profile_container">
            <div class="acc_details">
    <label>Account Number : <?php echo $row['account_number']; ?></label>
    <label>Account Name : <?php echo $_SESSION['customer_name']; ?></label>
    <form action="Deposite_process.php" method="post">
        <input type="number" name="deposite_amount" placeholder="Amount: Rs" class="acc_details" required /><br>
        <input type="text" name="remark" placeholder="Remarks" class="acc_details" required />
         <input type="submit" name="submit" value="Submit">
    </form>
    </div>
     </div>
</body>
<style>
    body{
        background-color:#003344;
    }
</style>
</html>