<!DOCTYPE>
<?php
session_start();
include("function/functions.php");
include("includes/db.php");
?>
<html>
    <head>
	  <title>My online shop</title>
	  <link rel="stylesheet" href="styles/style.css" media="all" />
	  </head>
	  <body>
	  
	  
	 
       <div id="header">
	     <h1>Paratha House</h1>
	   </div>
	 <div id="navbar">
	   <ul>
	       <li><a href="">Home</a></li>
		   <li><a href="">My Account</a></li>
		   <li><a href="">Sign up</a></li>
		   <li><a href="">Cart</a></li>
		   <li><a href="">Contact Us</a></li>
		 </ul>
	    <?php cart(); ?>
		 <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
		 <b style=" color:yellow;">Cart - </b>Total Items:<?php total_items();?> | Total Price:<?php total_price(); ?> | <a href="cart.php" style="color:yellow">Go to Cart</a>  
		 </span>
	
	  </div>
	  
	<div id="main">
	  <form action="customer_register.php" method="post" ectype="multipart/form-data"/>
	    <table align="center" width="750">
		  <tr align="center">
		    <td colspan="6"><h2>Create an account</h2></td>
		  </tr>
		  
		  <tr>
		     <td align="right">Customer Name:</td>
			 <td><input type="text" name="c_name" required/></td>
	      </tr>
		  
		  <tr>
		     <td align="right">Customer Email:</td>
			 <td><input type="text" name="c_email" required/></td>
	      </tr>
		  
		  <tr>
		     <td align="right">Customer Password:</td>
			 <td><input type="password" name="c_pass" required/></td>
	      </tr>
		   
	<!--	   
	   <tr>
	   <td align="right">Customer Image:</td>
	   <td><input type="file" name="c_image"/></td>
	   </tr> -->
	   
		  
		  
		
		  
		  <tr>
		     <td align="right">Customer Country</td>
			 <td>
			 <select name="c_country" required>
			   <option>Select a Country</option>
			   <option>Afghanistan</option>
			   <option>India</option>
			   <option>Israel</option>
			   <option>New Zealand</option>
			   <option>South Africa</option>
			 </select>
			 </td>
			 
			 
			 
	      </tr>
		   
		   <tr>
		     <td align="right">Customer City:</td>
			 <td><input type="text" name="c_city"  required/></td>
	      </tr>
		   
		   <tr>
		     <td align="right">Customer Contact:</td>
			 <td><input type="text" name="c_contact" required/></td>
	      </tr>
		  
		  <tr>
		     <td align="right">Customer Address:</td>
			 <td><input type="text" name="c_address" required/></td>
	      </tr>
		  <tr align="center">
		     <td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
		  </tr>
		 
		  
		  
		
		</table>
	  
	  
	  
	  
	  
	  </form>
</div>	  
	  <div>
	  
	  
	  <h2 style="text-align:center; padding-top:30px;">&copy;2019 by Sardip technologies</h2>
	  
	  
	  </div>
	  
	  
	  
	 
	  </body>
	  </html>
<?php
	   if(isset($_POST['register'])){
		 $ip = getIp();
         $c_name = $_POST['c_name'];		 
		 $c_email = $_POST['c_email'];		
         $c_pass = $_POST['c_pass'];	
          
		  
		/* $c_image=$_FILES['c_image']['name'];
		
	     $c_image_tmp=$_FILES['c_image']['tmp_name'];*/		 
	 	 
        	 
	     $c_country = $_POST['c_country'];		
		 $c_city = $_POST['c_city'];		
	     $c_contact = $_POST['c_contact'];	
         $c_address = $_POST['c_address'];	

          
	
	
	//move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		 
		 $insert_c ="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address)
		 values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address')";
		 	
		
	  $run_c = mysqli_query($con, $insert_c);
	  $sel_cart="select * from cart where ip_add='$ip'";
	  $run_cart=mysqli_query($con, $sel_cart);
	  $check_cart=mysqli_num_rows($run_cart);
	 


	 if($check_cart==0){
		  $_SESSION['customer_email']=$c_email;
		  
		  echo "<script>alert('Account has been created successfully, Thanks!')</script>";
	 
		  echo "<script>window.open('customer/my_account.php','_self')</script>";
	 }  
		  
	  
	  else{
		  $_SESSION['customer_email']=$c_email;
		 
		    echo "<script>alert('Account has been created successfully, Thanks!')</script>";
             echo "<script>window.open('customer/my_account.php','_self')</script>";
		  
	  }
		 

		  
	   
	   }
	  
	 ?> 
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  