<?php

if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin! ','_self')</script>";
}
else
{
	





?>


<table width="795" align="center" bgcolor="pink">
   <tr align="center">
     <td colspan="6"><h2>View All Parathas Here</h2></td>
	 </tr>
	 <tr align="center" bgcolor="skyblue">
	   <th>S.N</th>
	   <th>Title</th>
	   <th>Image</th>
	   <th>Price</th>
	   <th>Edit</th>
	   <th>Delete</th>
	 
	 </tr>
	 <?php
	   include("includes/db.php");
	   $get_par="select * from parathas";
	   $run_par=mysqli_query($con,$get_par);
	   $i=0;
	   
	   while($row_par=mysqli_fetch_array($run_par)){
		   
		   $par_id=$row_par['paratha_id'];
		   $par_title=$row_par['paratha_title'];
		   $par_image=$row_par['paratha_image'];
		   $par_price=$row_par['paratha_price'];
		   $i++;
	 
	 
	 ?>
     <tr align="center">
	   <td><?php echo $i;?></td>
       <td><?php echo $par_title;?></td>
       <td><img src="paratha_image/<?php echo $par_image;?>" width="60" height="60"/></td>
       <td><?php echo $par_price?></td>
	   <td><a href="index.php?edit_par=<?php echo $par_id;?>">Edit</a></td>
	   <td><a href="delete_par.php?delete_par=<?php echo $par_id;?>">Delete</a></td>
     </tr>
	   
	   
	   <?php
	   }
	   
	   ?>

</table>

<?php } ?>