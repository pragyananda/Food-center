<?php

include("function.php");
include("constraint.php");
//session_destroy();
$fdname=($_POST['fname']);
$fid=($_POST['id']);
$qty=($_POST['quantity']);
$price=($_POST['price']);
$added_on=date('Y-m-d h:i:s');

if( $_POST['quantity'] >0){
  
 



//adding data in databse 
if(isset($_POST['addcart'])){
  if(isset($_SESSION['prfilid']))
  {
    $pfid=$_SESSION['prfilid'];
    $check =mysqli_query($conn ,"SELECT * FROM dbl_cart WHERE users_id='$pfid' and food_id='$fid'");
   if(mysqli_num_rows($check)>0)
   {
     $row=mysqli_fetch_assoc($check);
     $cid=$row['id'];
     mysqli_query($conn, "UPDATE dbl_cart set qty='$qty' WHERE id ='$cid'");
     $_SESSION['addsuc']="<script>swal('Congratulations!', 'Your item is added!', 'success');</script>";
     header("location:".SITEURL.'shop.php');
   }
   else
   {
     $sql="INSERT INTO dbl_cart SET
      users_id='$pfid',
     food_name='$fdname',
     food_id='$fid',
     qty='$qty',
     price='$price',
     added_on='$added_on'
      ";
      
     $res=mysqli_query($conn,$sql) ;
     $_SESSION['addsuc']="<script>swal('Congratulations!', 'Your item is added!', 'success');</script>";
      header("location:".SITEURL.'shop.php');
   }
     
             
 
    }
  }
   
    

}else{
 
  $_SESSION['alertqty']="<script>swal('ERROR!', 'Enter Minimum 1 quantity...!', 'error');</script>";}
  header("location:".SITEURL.'shop.php');
?>
