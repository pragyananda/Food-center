<?php  
      include("function.php");
      include("constraint.php");
      include("headtag.php");
      ob_start();
       ?>


<?php
 if(isset($_SESSION['no-login-mg']))
 {
     echo $_SESSION['no-login-mg'];
     unset($_SESSION['no-login-mg']);//remove session 
 }
 if(isset($_SESSION['emailloginerror']))
 {
     echo $_SESSION['emailloginerror'];
     unset($_SESSION['emailloginerror']);//remove session 
 }


?>

<div class="login-register-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="login_register.php" method="post">
                                            <?php
                                              if(isset($_SESSION['email'])){
                                               echo $_SESSION['email'];
                                               unset($_SESSION['email']);//remove session 
                                              }
                                              if(isset($_SESSION['emaillogin'])){
                                                echo $_SESSION['emaillogin'];
                                                unset($_SESSION['emaillogin']);//remove session 
                                               }
                                                ?>
                                                <input type="email" name="user_email" placeholder="Email" required>
                                                <input type="password" name="user_password" placeholder="Password" required>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        
                                                        <a href="forgot_pass.php">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit" id="login_submit" name="submitlogin"><span>Login</span></button>
                                                </div>
                                                <input name="type"  type="hidden" value="login">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form id="register" action="" method="post">
                                                <input type="text" name="full_name" placeholder="name" id="name" required>
                                                <input name="email" placeholder="Email"  type="email"required>
                                               <div id="email_error" class="error_field"></div>
                                                <input type="password" name="password" placeholder="Password"required>
                                                <input name="text" placeholder="mobile"  type="mobile"required>
                                                <div class="button-box">
                                                    <button type="submit" id="register_submit" name="submitform"><span>Register</span></button>
                                                    
                                                </div>
                                                <input name="type"  type="hidden" value="register">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
//check button clicked or not
if (isset($_POST['submitform']))
{
   //get data form login
    $name=($_POST['full_name']);
  $email=($_POST['email']);
   $mobile=($_POST['text']);
 $password=($_POST['password']);//encrypt
  $type=($_POST['type']);
    $added_on=date('Y-m-d h:i:s');
    
    if($type=='register') {
        $check=mysqli_query($conn," SELECT * FROM dbl_user WHERE email='$email' ");
        if(mysqli_num_rows($check)>0){
            //error email exist
            $_SESSION['alexist']="<script>swal ( 'Oops' ,  'Email already registered!' ,  'error' )</script>";

        }
        else
        { 
                
  $sql="INSERT INTO dbl_user SET
  name='$name',
  email='$email',
  mobile='$mobile',
  password='$password',
  status='1',
  added_on='$added_on'
  ";
   //checkexecute
   

   $res=mysqli_query($conn,$sql) ;
    
    }
}

}


?>
    <?php
//check button clicked or not
if (isset($_POST['submitlogin']))
{
   //get data form login
   
  $email=($_POST['user_email']);
  $type=($_POST['type']);
 $password=($_POST['user_password']);//encrypt
  
    
    if($type=='login') {
        $res=mysqli_query($conn," SELECT * FROM dbl_user WHERE email='$email' and password='$password' ");
        $check=mysqli_num_rows($res);
        $row=mysqli_fetch_assoc($res);
        
    }
        if($check>0){
            $_SESSION['prfilid']=$row['id'] ;

            $_SESSION['prfilname']=$row['name'] ;
           
            header("location:".SITEURL.'shop.php');
            $_SESSION['emaillogin']="<script>swal('Thank you for joining us!', 'Login succesfully', 'success')</script>";
            ob_end_flush();
           
        }else
        {
            //error email exist
            $_SESSION['emailloginerror']="<script>swal ( 'Oops' ,  'Enter valid information!' ,  'error' )</script>";
          
        }
            
 
    }






?>