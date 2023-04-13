<?php  include("constraint.php"); ?>


<html>
    <head>
        <title>login food order system</title>
       <link rel="stylesheet" href="adstyle.css">
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <div class="login">
            <h1 class="text_center">login</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                   unset($_SESSION['login']);//remove session 
                }
                if(isset($_SESSION['no-login-msg'])){
                echo $_SESSION['no-login-msg'];
                unset($_SESSION['no-login-msg']);//remove session 
                 }


             ?>
             <br><br>
            <!-- login-->
            <form action="" method="post" class="text_center">
                username: <input type="text" name ="username" placeholder="enter username"><br><br>
               
                password: <input type="password" name ="password" placeholder="enter your password"><br><br>
               
                <input type="submit" name ="submitform" value="Login" class="btn-primary ">
                <br><br>
            </form>



            <p class="text_center" style="font-size:15px;">created by-pragyanadasaho and abhinav</p>
        </div>
    </body>
</html>
<?php
//check button clicked or not
if (isset($_POST['submitform']))
{
    //get data form login
 $username=$_POST['username'];
 $password=($_POST['password']);
 //sql to check whether user exist or not 
 $sql="SELECT * FROM dbl_admin WHERE username='$username' AND password='$password'"; 
 //checkexecute
 $res=mysqli_query($conn,$sql);
 //count 
 
 $count =mysqli_num_rows($res);
 
 if($count==1){

   // echo 'user here';
    $_SESSION['logins']="<script>swal('Login successfully!', 'Thanks for use!', 'success')</script>";
    $_SESSION['user']=$username;//checkwhether the user login or not and logout and unset it
                      header("location:".SITEURL.'admin/');
 }
 else
 {
    // echo 'user not here';
     $_SESSION['login']="<script>swal ( 'Oops' ,  'Enter valid information!' ,  'error' )</script>";
     header("location:".SITEURL.'admin/login.php');
 }




}




?>