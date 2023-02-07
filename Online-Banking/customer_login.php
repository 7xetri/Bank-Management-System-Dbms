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
        <div class="formspace">
		<p class="formspace2">
         <div class="form">  
         <label class="login">LOGIN</label>
            <div class="input_field">  
            <label class="userdetail">Customer ID</label><br>
            <input class="customer_id" type="text" name="customer_id" required /><br>
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
     
    </body>
</html> 
<?php include 'customer_login_process.php'?>