<?php
 
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($str){
	global $conn;
	$str=mysqli_real_escape_string($conn,$str);
	return $str;

}
function cart()
{
	header("location:cart.php");
}

function redirect($link){
	?>
	<script>
	window.location.href='<?php echo $link?>';
	</script>
	<?php
	die();
}
function getUserDetailsByid(){
	global $conn;
	$data['id']='';
	$data['email']='';
	$data['mobile']='';
	$data['profile_img']='';
	
	
	if(isset($_SESSION['prfilid'])){
		$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from dbl_user where id=".$_SESSION['prfilid']));
		$data['id']=$row['id'];
		$data['name']=$row['name'];
		$data['email']=$row['email'];
		$data['mobile']=$row['mobile'];
		$data['profile_img']=$row['profile_img'];
	}
	return $data;
	
}
function getorderdetails($oid)
{
 global $conn;
 $sql="SELECT order_detail.price,order_detail.qty,dbl_food.title FROM order_detail,dbl_food
 where order_detail.order_id=$oid AND order_detail.food_details_id=dbl_food.id "	;
 $res=mysqli_query($conn,$sql);
 $data=array();
 while($row=mysqli_fetch_assoc($res))
 {
	 $data[]=$row;
 }
 return $data;
}
function getUserCart(){
	global $conn;
	$arr=array();
	$id=$_SESSION['prfilid'];
	$res=mysqli_query($conn,"SELECT * from dbl_cart where user_id='$id'");
	while($row=mysqli_fetch_assoc($res)){
		$arr[]=$row;
	}
	return $arr;
}


function emptyCart(){
		if(isset($_SESSION['prfilid'])){
			global $conn;
			$res=mysqli_query($conn,"DELETE from dbl_cart where users_id=".$_SESSION['prfilid']);
		}else{
			
		}
}




?>