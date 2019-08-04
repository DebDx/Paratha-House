<?php

$con = mysqli_connect("localhost","root","","ecommerce");
if(mysqli_connect_errno())
{
	echo "The Connection was not establishe:" . mysqli_connect_error();
}
function getIp() {
	$ip=$_SERVER['REMOTE_ADDR'];
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
RETURN $ip;
	
}

function total_items(){
if(isset($_GET['add_cart'])){
global $con;
$ip = getIp();
$get_items = "select * from cart where ip_add='$ip'";
$run_items = mysqli_query($con, $get_items);
$count_items=mysqli_num_rows($run_items);
}	
else
{
	global $con;
	$ip = getIp();
$get_items = "select * from cart where ip_add='$ip'";
$run_items = mysqli_query($con, $get_items);
$count_items=mysqli_num_rows($run_items);
}	
	
echo $count_items;	
	
}

function total_price(){
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
		$values = array_sum($paratha_price);
		$total+=$values;
	}


}
echo "$".$total;
}

function cart(){
if(isset($_GET['add_cart'])){
	global $con;
	$ip=getIp();
    $par_id = $_GET['add_cart'];
    $check_par = "select * from cart where ip_add='$ip' AND p_id='par_id'";	
    $run_check = mysqli_query($con, $check_pro);
	if(mysqli_num_rows($run_check)>0){
		echo"";
	}
			else{
				$insert_par = "insert into cart (p_id,ip_add) values ('$par_id','$ip')";
				$run_par = mysqli_query($con, $insert_par);
				echo "<script>window.open('index.php','_self')</script>";
			}
	
}
	
	
	
	
	
}



function getPar(){
	global $con;
	$get_par = "select * from parathas ";
	$run_par = mysqli_query($con, $get_par);
	while($row_par=mysqli_fetch_array($run_par)){
		$par_id = $row_par['paratha_id'];
		$par_title = $row_par['paratha_title'];
		$par_price = $row_par['paratha_price'];
		$par_image = $row_par['paratha_image'];
		
		echo"
		    <div id='single_product'>
			  <h3>$par_title</h3>
			  <img src='admin_area/paratha_image/$par_image' width='180px' height='180px' />
			  <p><b>Price: $$par_price</b></p>
			  <a href='details.php?par_id=$par_id' style='float:left';'>Details</a>
			  
			  <a href='index.php?add_cart=$par_id'><button style='float:right'>Add to Cart</button></a>
			</div>
		   
		
		";
		
	}
		
}
	?>