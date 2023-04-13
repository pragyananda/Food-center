<?php
//constraint
 include("constraint.php"); 
//destroy the session and redirect login page
session_destroy();// unset $_session ['user']
///redirect
header("location:".SITEURL.'admin/login.php');


?>