<?php
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin! ','_self')</script>";
}
else
{
	
	
	






?>
<!DOCTYPE>
<html>
   <head>
      <title>This is Admin Panel</title>
	  <link rel="stylesheet" href="styles/style.css" media="all"/>
   </head>
   <body>
   <div class="main_wrapper">
   <div id="header"></div>
   <div id="right">
   <h2 style="text-align:center;">Manage Content</h2>
   <a href="index.php?insert_paratha">Insert New Paratha</a>
   <a href="index.php?view_parathas">View All Parathas</a>
   <a href="index.php?view_customers">View Customers</a>
   <a href="index.php?view_orders">View Orders</a> 
   <a href="index.php?view_payments">View Payments</a>
   <a href="logout.php">Admin Logout</a>
  
   
   
   </div>
   <div id="left">
   <h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in'];?></h2>
   <?php
   if(isset($_GET['insert_paratha'])){
	   include("insert_paratha.php");
   }
   if(isset($_GET['view_parathas'])){
	   include("view_parathas.php");
   }
   if(isset($_GET['edit_par'])){
	   include("edit_par.php");
   }
   if(isset($_GET['view_customers'])){
	   include("view_customers.php");
   }
   ?>
   
   </div>
   </div>
   
   </body>
   </html>
   <?php
   }?>