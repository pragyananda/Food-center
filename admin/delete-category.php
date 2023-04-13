<?php
include('constraint.php');
// get id of admin to delete
$id=$_GET['id'];
//check image or id


//create sql query o delete admin
$sql="DELETE FROM dbl_category WHERE id=$id";

//execute query
$res = mysqli_query($conn,$sql);

//check 
if($res==TRUE)
{
    //echo 'admin deleted';
    //create session to disply
    $_SESSION['delete']="<div class='success'>category is deleted</div>";
    header('location:'.SITEURL.'admin/managecategory.php');

}
else{
    //echo 'admin not deleted';
    //create session to disply
    $_SESSION['delete']="<div class='error'>category isn't deleted</div>";
    header('location:'.SITEURL.'admin/managecategory.php');
    
}








?>