<!DOCTYPE>
<?php
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
	       <li><a href="">Home</a></li>
		   <li><a href="">My Account</a></li>
		   <li><a href="">Sign up</a></li>
		   <li><a href="">Cart</a></li>
		   <li><a href="">Contact Us</a></li>
		 </ul>
		 <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
		 <b style=" color:yellow;">Shopping Cart - </b>Total Items : Total Price:<a href="cart.php" style="color:yellow">Go to Cart</a>
		 </span>
	 <div id="form">
	 
	 </div>
	  </div>
	  
	  
	  <div id="main">
	 
	  
	    <div id="parathas_box">
		
		<?php
		if(isset($_GET['par_id'])){
			$paratha_id = $_GET['par_id'];
		$get_par = "select * from parathas where paratha_id='$paratha_id'";
	$run_par = mysqli_query($con, $get_par);
	while($row_par=mysqli_fetch_array($run_par)){
		$par_id = $row_par['paratha_id'];
		$par_title = $row_par['paratha_title'];
		$par_price = $row_par['paratha_price'];
		$par_image = $row_par['paratha_image'];
		$par_desc =$row_par['paratha_desc'];
		echo"
		    <div id='single_product'>
			  <h3>$par_title</h3>
			  <img src='admin_area/paratha_image/$par_image' width='400px' height='300px' />
			  <p><b>$ $par_price</b></p>
			  <p>$par_desc</p>
			  <a href='index.php' style='float:left;'>Go Back</a>
			  
			  <a href='index.php?par_id=$par_id'><button style='float:right'>Add to Cart</button></a>
			</div>
		   
		
		";
		
	}
		}
		
?>		
		
		</div>
	  
	  </div>
	  
	  
	  <div>
	  
	  
	  <h2 style="text-align:center; padding-top:30px;">&copy;2019 by Sardip technologies</h2>
	  
	  
	  </div>
	  
	  
	  
	 
	  </body>
	  </html>