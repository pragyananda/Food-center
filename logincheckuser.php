<?php  
 //authorization    
//check user login or not 
if(!isset($_SESSION['prfilid']))//if user not set
{
///if user not login
//redirect
$_SESSION['no-login-mg'] = "<div class='error text_center'>please login to access Dashboard</div>";
header("location:login_register.php");
}



?>