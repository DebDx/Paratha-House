<!DOCTYPE>
<?php
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin! ','_self')</script>";
}
else
{
	
include("includes/db.php");
?>
<html>
    <head>
	    <title>Inserting Parathas</title>
	</head>
<body>

<form action="insert_paratha.php" method="post" enctype="multipart/form-data">

  <table align="center" width="795" border="2" bgcolor="orange">
    <tr align="center">
	   <td colspan="7"><h2>Insert New Post Here</h2></td>
	
	
	
	</tr>
	<tr>
	   <td align="right"><b>Paratha Title:</b></td>
	   <td><input type="text" name="paratha_title" required /></td>
	   </tr>
	   
	   <tr>
	   <td align="right"><b>Paratha Image:</b></td>
	   <td><input type="file" name="paratha_image" required /></td>
	   </tr>
	   
	   <tr>
	   <td align="right"><b>Paratha Price:</b></td>
	   <td><input type="text" name="paratha_price" required /></td>
	   </tr>
	   
	   
	   
	   <tr>
	   <td align="right"><b>Paratha Description:</b></td>
	   <td><textarea name="paratha_desc" cols="20" rows="10"/></textarea></td>
	  
	   </tr>
	   
	   
	   
	    
		<tr>
	   <td align="right"><b>Paratha Keywords:</b></td>
	   <td><input type="text" name="paratha_keywords" required /></td>
	   </tr>
	   
	   <tr align="center">
	      <td colspan="7"><input type="submit" name="insert_post" value="Insert Now"/></td>
	   </tr>
</table>


</form>

</body>
</html>
<?php
if(isset($_POST['insert_post'])){
	
	$paratha_title = $_POST['paratha_title'];
	$paratha_price = $_POST['paratha_price'];
	$paratha_desc = $_POST['paratha_desc'];
	$paratha_keywords = $_POST['paratha_keywords'];
	
	
	$paratha_image=$_FILES['paratha_image']['name'];
	$paratha_image_tmp=$_FILES['paratha_image']['tmp_name'];
	
	
	move_uploaded_file($paratha_image_tmp,"paratha_image/$paratha_image");
	
 $insert_paratha="insert into parathas(paratha_title,paratha_price,paratha_desc,paratha_image,paratha_keywords) values('$paratha_title','$paratha_price','$paratha_desc','$paratha_image','$paratha_keywords')";
	
	$insert_par= mysqli_query($con, $insert_paratha);
	if($insert_par){
		echo "<script>alert('Paratha has been inserted!')</script>";
		echo "<script>window.open('index.php?insert_paratha','_self')</script>";
}
}

?>

<?php } ?>

