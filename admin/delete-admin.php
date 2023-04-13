<?php
include('constraint.php');
// get id of admin to delete
$id=$_GET['id'];
//create sql query o delete admin
$sql="DELETE FROM dbl_admin WHERE id=$id";

//execute query
$res = mysqli_query($conn,$sql);

//check 
if($res==TRUE)
{
    //echo 'admin deleted';
    //create session to disply
    $_SESSION['delete']="<script>alert('admin is deleted')</script>";
    header('location:'.SITEURL.'admin/manageadmin.php');

}
else{
    //echo 'admin not deleted';
    //create session to disply
    $_SESSION['delete']="<div class='error'>admin isn't deleted</div>";
    header('location:'.SITEURL.'admin/manageadmin.php');
    
}








?>