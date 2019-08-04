<!DOCTYPE>
<?php
session_start();
include("function/functions.php");
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
	       <li><a href="../index.php">Home</a></li>
		   <li><a href="">My Account</a></li>
		   <li><a href="#">Sign up</a></li>
		   <li><a href="../cart.php">Cart</a></li>
		   <li><a href="#">Contact Us</a></li>
		 </ul>
		 <?php cart(); ?>
		 <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
		
		 
		 
		
         <?php
		 if(!isset($_SESSION['customer_email'])){
			 
			echo "<a href='checkout.php' style='color:white;'>Login</a>";
		 }
         else{
            echo "<a href='logout.php' style='color:white;'>Logout</a>";
		 }		
			
		 
		 
		 
		 
		 
		 
		 ?>


		 
		 </span>
	
	  </div>
	  
	
	  <div id="main">
	                    
	  
	    <div id="parathas_box">
		
		   <div id="sidebar">
		      <div id="sidebar_title">My Account:</div>
		     <ul id="cats">
			 <?php
			 $user=$_SESSION['customer_email'];
			 $get_img="select * from customers where customer_email='$user'";
			 $run_img=mysqli_query($con,$get_img);
			 $row_img=mysqli_fetch_array($run_img);
			 $c_name=$row_img['customer_name'];
			 
			 ?>
			  <li><a href="my_account.php?my_orders">My Orders</a></li>
			  <li><a href="my_account.php?edit_account">Edit Account</a></li>
			  <li><a href="my_account.php?change_pass">Change Password</a></li>
			  <li><a href="my_account.php?delete_account">Delete Account</a></li>
		     
	        </ul>
			
		</div>
		<h2 style="padding:20px;">Welcome: <?php echo $c_name;?></h2><br><br>
		<div id="link">
		<?php
		if(!isset($_GET['my_orders'])){
			if(!isset($_GET['edit_account'])){
				if(!isset($_GET['change_pass'])){
					if(!isset($_GET['delete_account'])){
		   echo "<b>You can see your order progress by clicking this <a href='my_account.php?my_orders'>link</a></b>" ;
		     }
			}
			}
		}
		?>
		
		<?php
		  if(isset($_GET['edit_account'])){
		  include("edit_account.php");
		  }
	
		  if(isset($_GET['change_pass'])){
		  include("change_pass.php");
		  }
		  
		  
		  if(isset($_GET['delete_account'])){
		  include("delete_account.php");
		  }
		
		?>
		
		
			
		</div>
		
		
	  </div>
	  </div>

	  
	  
	  <div>
	  
	  
	  <h3 style="text-align:center; padding-top:30px;">&copy;2019 by Sardip technologies</h3>
	  
	  </div>
	  
	  
	  
	  
	 
	  </body>
	  </html>