<?php
include 'header.php' ;
include 'customer_profile_header.php';
if($_SESSION['customer_login'] == FALSE)
{
	 header('location:customer-login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statement</title>
    <link rel="stylesheet" type="text/css" href="css/statement.css"/>
    <style>
        #customer_profile .link7{

background-color: rgba(5, 21, 71,0.4);

}
    </style>
</head>
<body>
    <div id="stbox">
        <span><h3>Bank Statement</h3></span>
        <div class="statement">
                <table>
                <th width="2%">#</th>
                <th width="15%">Date</th>
                <th width="20%">Trans. Id</th>
                <th width="10%">Cr.</th>
                <th width="10%">Dr.</th>
                <th width="15%">Available Balance</th>
                <th width="30%">Remarks</th>
            
            <?php 
            $cust_id = $_SESSION['Customer_Id'];
            $sql = "SELECT * from recordbook_$cust_id ORDER BY transaction_date DESC" ;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {	   
                $Sl_no = 1; 
      // output data of each row
          while($row = $result->fetch_assoc()) {
              
          echo '
              <tr>
              <td>'.$Sl_no++.'</td>
              <td>'.$row['transaction_date'].'</td>
              <td>'.$row['transaction_id'].'</td>
              <td>'.$row['Cr_amount'].'</td>
              <td>'.$row['Dr_amount'].'</td>
              <td>'.$row['Net_Balance'].'</td>
              <td>'.$row['Remark'].'</td>
              </tr>';
      }
      
      
  }
  
            ?>
            </table>
    </div>
</body>
</html>