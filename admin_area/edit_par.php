<!DOCTYPE>
<?php
include("includes/db.php");
if(isset($_GET['edit_par'])){
	
	$get_id=$_GET['edit_par'];
	$get_par="select * from parathas where paratha_id='$get_id'";
	   $run_par=mysqli_query($con,$get_par);
	   $i=0;
	   
	  
		   $row_par=mysqli_fetch_array($run_par);
		   $par_id=$row_par['paratha_id'];
		   $par_title=$row_par['paratha_title'];
		   $par_image=$row_par['paratha_image'];
		   $par_price=$row_par['paratha_price'];
		   $par_desc=$row_par['paratha_desc'];
		   $par_keywords=$row_par['paratha_keywords'];

}
?>
<html>
    <head>
	    <title>Update Parathas</title>
	</head>
<body>

<form action="" method="post" enctype="multipart/form-data">

  <table align="center" width="795" border="2" bgcolor="orange">
    <tr align="center">
	   <td colspan="7"><h2>Edit and Update Paratha</h2></td>
	
	
	
	</tr>
	<tr>
	   <td align="right"><b>Paratha Title:</b></td>
	   <td><input type="text" name="paratha_title" size="60" value="<?php echo $par_title;  ?>"/></td>
	   </tr>
	   
	   <tr>
	   <td align="right"><b>Paratha Image:</b></td>
	   <td><input type="file" name="paratha_image" /><img src="paratha_image/<?php echo $par_image;?>" width="60" height="60"</td>
	   </tr>
	   
	   <tr>
	   <td align="right"><b>Paratha Price:</b></td>
	   <td><input type="text" name="paratha_price" value="<?php echo $par_price;  ?>" /></td>
	   </tr>
	   
	   
	   
	   <tr>
	   <td align="right"><b>Paratha Description:</b></td>
	   <td><textarea name="paratha_desc" cols="20" rows="10"><?php echo $par_desc;  ?></textarea></td>
	  
	   </tr>
	   
	   
	   
	    
		<tr>
	   <td align="right"><b>Paratha Keywords:</b></td>
	   <td><input type="text" name="paratha_keywords" value="<?php echo $par_keywords;  ?>"/></td>
	   </tr>
	   
	   <tr align="center">
	      <td colspan="7"><input type="submit" name="update_paratha" value="Update Paratha"/></td>
	   </tr>
</table>


</form>

</body>
</html>
<?php
if(isset($_POST['update_paratha'])){
	$update_id=$par_id;
	$paratha_title = $_POST['paratha_title'];
	$paratha_price = $_POST['paratha_price'];
	$paratha_desc = $_POST['paratha_desc'];
	$paratha_keywords = $_POST['paratha_keywords'];
	
	
	$paratha_image=$_FILES['paratha_image']['name'];
	$paratha_image_tmp=$_FILES['paratha_image']['tmp_name'];
	
	
	move_uploaded_file($paratha_image_tmp,"paratha_image/$paratha_image");
	
 $update_paratha="update parathas set paratha_title='$paratha_title',paratha_price='$paratha_price',paratha_desc='$paratha_desc',paratha_image='$paratha_image',paratha_keywords='$paratha_keywords' where paratha_id='$update_id'";
	
	$run_par= mysqli_query($con, $update_paratha);
	if($run_par){
		echo "<script>alert('Paratha has been updated!')</script>";
		echo "<script>window.open('index.php?view_parathas','_self')</script>";
}
}

?>



