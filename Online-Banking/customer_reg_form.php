
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/customer-reg-form.css"/>
    
	 <?php include'header.php';  ?>
    </head>
    <body>
    <div class="container_regfrm_container_parent">
	<h3>Online Account Opening Form</h3>
	<div class="container_regfrm_container_parent_child">
	
		<form action="connection.php" method="post">
				 <input type="text" name="name" placeholder="Name" id="name" required />
				 <select name ="gender" id="gender" required >
					  <option class="default" value="" disabled selected>Gender</option>
					  <option value="m"  required>Male</option>
					  <option value="f" >Female</option>
				</select>
                <input type="text" name="dob" placeholder="Date of Birth" onfocus="(this.type='date')" id="dob" required />
				 <input type="text" name="mobile" placeholder="Mobile no" id="mobile" required />
				 <input type="text" name="email" placeholder="Email id" id="email" />
				 <input type="text" name="citizenship" placeholder="Citizenship Number" id="citizenship" required />
				 <input  id="homeaddrs" type="text" name="homeaddrs" placeholder="Home Address" required  />
			     <input  id="street" type="text" name="street" placeholder="Street" required  />




				 <select name ="city" id="city" required >
					  <option class="default" value="" disabled selected>Branch City</option>
					  <option value="Kathmandu">Kathmandu</option>
					  <option value="Pokhara">Pokhara</option>
					  <option value="Biratnagar">Biratnagar</option>
					  <option value="Janakpur">Janakpur</option>
					  <option value="Bharatpur">Bharatpur</option>
					  <option value="Bigunj">Birgunj</option>
					  <option value="Itahari">Itahari</option>
					  <option value="Lalitpur">Lalitpur</option>
					  <option value="Nepalgunj">Nepalgunj</option>
					  <option value="Dhangadhi">Dhangadhi</option>
					  <option value="Dharan">Dharan</option>
					  <option value="Hetauda">Hetauda</option>
					  <option value="Bhaktapur">Bhaktapur</option>
					  <option value="Butwal">Butwal</option>
					  <option value="Kritipur">Kritipur</option>
					  <option value="Tulsipur">Tulsipur</option>
					  <option value="Siddharthanagar">Siddharthanagar</option>
					  <option value="Birendranagar">Sitka</option>
					  <option value="Tikapur">Tikapur</option>
					  <option value="Ghorahi">Ghorahi</option>
					  <option value="Panauti">Panauti</option>
					  <option value="Gaighat">Gaighat</option>
					  <option value="Rajbiraj">Rajbiraj</option>
					  <option value="Baglung">Baglung</option>
					  <option value="Tansen">Tansen</option>
					  
				</select>



				 
				 <input type="text" name="pin" placeholder="Pin Code"  id="pin" required />
				 <br>
				 <input type="password" name="password1" placeholder="Set login Password"  id="password" required />
				 <br>
				 <input type="password" name="password2" placeholder="*Retype password"  id="password" required />
				<input type="submit" name="submit" value="Submit">
				</form>
			
         </div>
		 
		 </div>
		 
 <?php include'footer.php';?> 
    
</body>
</html> 

