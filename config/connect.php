<?php


  //create costraint to store non repeting value
  define('SITEURL','http://localhost/food center/');
  define('LOCALHOST','localhost');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('DB_NAME',"food_center");


 $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());//databse connection
 $db_select =mysqli_select_db($conn,DB_NAME) or die (mysqli_error());//select
?>