<html>
<head>
    <title>Login Page</title>
  
    <link rel="stylesheet" type="text/css" href="css/customer-login.css" />

    </head>
    <body>
        
	 <?php include 'header.php' ?>
        <div class="login_container">
            
      <form method="post"> 
                
      <br>
      <h3>*NOTE: EXIT, IF YOU ARE NOT AUTHORIZED PERSON</h3>
        <div class="formspace">   
		<p class="formspace2">
         <div class="form">  
         <label class="login">STAFF&nbsp;</label>
            <div class="input_field">  
            <label class="userdetail">Staff Id</label><br>
            <input class="customer_id" type="text" name="staff_id" required /><br>
            <label class="userdetail">Password</label><br>
            <input class="password" type="password" name="password" required/><br>
             <input class="login-btn" type="submit" name="login-btn" value="LOGIN"/><br>
             </div>
            </div>
          
		</div>  
            </form>
</div>
        <br>
        
        <?php include 'footer.php' ?>
     <style>
        h3{
            color:white;
            text-align:center;
        }
     </style>
    </body>
</html> 
<?php include 'staff_login_proc.php'?>