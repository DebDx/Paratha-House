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
		   <li><a href="">Cart</a></li>
		   <li><a href="#">Contact Us</a></li>
		 </ul>
		 <?php cart(); ?>
		 <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
		 <b style=" color:yellow;">Cart - </b>Total Items:<?php total_items();?> | Total Price:<?php total_price(); ?> | <a href="index.php" style="color:yellow">Back to shop</a> 
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
		
		<form action="" method="post" ectype="multipart/form_data">
		 <table align="center" width="700" bgcolor="skyblue">
		   <tr>
		    
			
		<tr align="center">
		   <th>Remove</th>
		   <th>Product(s)</th>
		   <th>Total Price</th>
		   
		</tr>
		<?php
		$total=0;
	
	global $con;
	$ip = getIp();
	$sel_price = "select * from cart where ip_add='$ip'";
	$run_price = mysqli_query($con, $sel_price);
	while($p_price=mysqli_fetch_array($run_price)){
	 $par_id = $p_price['p_id'];	
     $par_price = "select * from parathas where paratha_id='$par_id'";
	 $run_par_price = mysqli_query($con,$par_price);
     while($pp_price = mysqli_fetch_array($run_par_price)){	 
		$paratha_price = array($pp_price['paratha_price']);
		$paratha_title=$pp_price['paratha_title'];
		$paratha_image=$pp_price['paratha_image'];
		$single_price=$pp_price['paratha_price'];
		$values = array_sum($paratha_price);
		$total+=$values;

?>
<tr align="center">
  <td><input type="checkbox" name="remove[]" value="<?php echo $par_id;?>"/></td>
  <td><?php echo $paratha_title;?><br>
  <img src="admin_area/paratha_image/<?php echo $paratha_image;?>" width="60" height="60"/>
  </td>
   <td><?php echo "$".$single_price?></td>
</tr>


	
	<?php }}?>
	<tr align="right">
	   <td colspan="4"><b>Sub Total:</b></td>
	   <td colspan="4"><?php echo "$".$total;?></td>
	</tr>
	<tr align="center">
	   <td><input type="submit" name="update_cart" value="Update Cart"/></td>
	   <td><input type="submit" name="continue" value="Continue Shopping"/></td>
	   <td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
	
	</tr>
		
		</table>
		</form>
		
		<?php
		$ip=getIp();
		if(isset($_POST['update_cart'])){
		    foreach($_POST['remove'] as $remove_id){
			$delete_paratha = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";  
			$run_delete=mysqli_query($con, $delete_paratha);
            if($run_delete){
			echo "<script>window.open('cart.php','_self')</script>";	
		   }
		   }
			
			
		}
		if(isset($_POST['continue'])){
			echo "<script>window.open('index.php','_self')</script>";	
		}
		?>
		
		</div>
	  
	  </div>
	  
	  
	  <div>
	  
	  
	  <h2 style="text-align:center; padding-top:30px;">&copy;2019 by Sardip technologies</h2>
	  
	  
	  </div>
	  
	  
	  
	 
	  </body>
	  </html>