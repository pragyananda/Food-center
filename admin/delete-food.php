<?php
include('constraint.php');
// get id of food to delete
$id=$_GET['id'];
//check image or id


//create sql query o delete admin
$sql="DELETE FROM dbl_food WHERE id=$id";

//execute query
$res = mysqli_query($conn,$sql);

//check 
if($res==TRUE)
{
    //echo 'food deleted';
    //create session to disply
    $_SESSION['delete']="<div class='success'>food is deleted</div>";
    header('location:'.SITEURL.'admin/managefood.php');

}
else{
    //echo food not deleted';
    //create session to disply
    $_SESSION['delete']="<div class='error'>food isn't deleted</div>";
    header('location:'.SITEURL.'admin/managefood.php');
    
}








?>