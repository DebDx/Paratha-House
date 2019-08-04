<?php
include("includes/db.php");
   if(isset($_GET['delete_par'])){
   
   $delete_id=$_GET['delete_par'];   
   
   $delete_par="delete from parathas where paratha_id='$delete_id'";
   
   $run_delete=mysqli_query($con, $delete_par);
   if($run_delete){
	 echo "<script>alert('A product has been deleted!')</script>";
     echo "<script>window.open('index.php?view_parathas','_self')</script>"; 
	   
	   
	   
   }


   }




?>