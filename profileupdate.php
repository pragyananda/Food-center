<?php

include("function.php");
include("file:///C:/xampp/htdocs/project/config/constraint.php");
if(isset($_SESSION['prfilid']))
{ $pfid=$_SESSION['prfilid'];
    
}

$name=($_POST['username']);
$mobile=($_POST['usermobile']);
$email=($_POST['useremail']);
if(isset($_FILES['image']))
   {
    $image_name=$_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_tmp=$_FILES['image']['tmp_name'];
    $image_type=$_FILES['image']['type'];
    $dst="img/user_profile/".$image_name;
    $default="avatar7.png";
   move_uploaded_file($image_tmp,$dst);
   
   if(!$image_name==0)
   {
      $image_name=$_FILES['image']['name'];
      echo 'success profile image';
   }
   else{
      $image_name=$default;
      echo 'image not found';
   }
  
$address=($_POST['address']);
$old_password=md5($_POST['old_pass']);
$new_pass=md5($_POST['new_pass']);

if(isset($_POST['saveuser']))
{  
   

   }
        $res=mysqli_query($conn," UPDATE dbl_user set name='$name',mobile='$mobile',profile_img='$image_name' WHERE id='$pfid' ");
           if($res==TRUE)
           {
            $_SESSION['prfilname']=$name;
            echo 'Profile updated successfully';
            header("location:profile.php");
           }
           else{
            $_SESSION['userup']="<script>swal ( 'Oops' ,  'Enter valid information!' ,  'error' )</script>"; 
            header("location:profile.php");
           } 
        
}
if(isset($_POST['chanpass']))
{  
        $check=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dbl_user WHERE  password='$old_password' "));
        $res=mysqli_query($conn,"SELECT * FROM dbl_user WHERE id=$pfid");
        $row=mysqli_fetch_assoc($res);
        $dbpass=$row['password'];
           if($dbpass==$old_password)
           {
            $res=mysqli_query($conn," UPDATE dbl_user set password='$new_pass' WHERE id='$pfid' ");
            if($res==TRUE)
            {
             $_SESSION['chan']="<script>swal ( 'Password' ,  'Password changed!' ,  'success' )</script>";
             header("location:profile.php");
            }
            else{
                $_SESSION['chan']="<script>swal ( 'Oops' ,  'Enter valid information!' ,  'error' )</script>"; 
             header("location:profile.php");
            } 
            
           }
           else{
            $_SESSION['chan']="<script>swal ( 'Oops' ,  'Enter valid information!' ,  'error' )</script>"; 
            header("location:profile.php");
           } 
        
}


?>