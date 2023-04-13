<?php  
 //authorization    
//check user login or not 
if(!isset($_SESSION['user']))//if user not set
{
///if user not login
//redirect
$_SESSION['no-login-msg'] = "<div class='error text_center'>please login to access admin panel</div>";
header("location:".SITEURL.'admin/login.php');
}



?>