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
	        <li><a href="index.php">Home</a></li>
		   <li><a href="customer/my_account.php">My Account</a></li>
		   <li><a href="#">Sign up</a></li>
		   <li><a href="cart.php">Cart</a></li>
		   <li><a href="#">Contact Us</a></li>
		 </ul>
	    <?php cart(); ?>
		 <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
		 <b style=" color:yellow;">Cart - </b>Total Items:<?php total_items();?> | Total Price:<?php total_price(); ?> | <a href="cart.php" style="color:yellow">Go to Cart</a>  
		 </span>
	
	  </div>
	  
	
	  <div id="main">
	                    
	   <div id="parathas_box">
	   
		<?php
		if(!isset($_SESSION['customer_email'])){
			include("customer_login.php");
		}
		else{
			include("payment.php");
		}
		
		?>
	  
	  </div>
	  </div>
	  
	  <div>
	  
	  
	  <h2 style="text-align:center; padding-top:30px;">&copy;2019 by Sardip technologies</h2>
	  
	  
	  </div>
	  
	  
	  
	 
	  </body>
	  </html>