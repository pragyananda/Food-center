<?php  include("partials/menu.php"); ?>

<div class="main">
    <div class="mgk">
        <h1>
           change password
        </h1><br><br>

        <?php
           if (isset($_GET['id']))
           {
               $id=$_GET['id'];
           }
          




?>
        <form action="" method="POST">
             <table class="tbl_30">
                 <tr>
                     <td>
                         current password
                     </td>
                     <td>
                         <input type="password" name=" current_password"  placeholder="current password">
                     </td>
                 </tr>
                 <tr>
                     <td>
                        new password
                     </td>
                     <td>
                         <input type="password" name=" new_password"  placeholder="new password">
                     </td>
                 </tr>
                 <tr>
                     <td>
                       confirm password
                     </td>
                     <td>
                         <input type="password" name=" confirm_password"  placeholder="confirm password">
                     </td>
                 </tr>
                
                 
                 <tr>
                     <td colspan="2">
                         <input type="hidden" name="id" value="<?php echo $id;?>">
                          <input type="submit" name="submitform" value="change password" class="btn-secoendary">
                     </td>
                 </tr>
               
               
                 
             </table>
         </form>
</div>
</div>
<?php  
//check button clicked or not
if(isset($_POST['submitform']))
{
    //echo 'button clicked';
    //get data form 
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);
    //create sql query to update
    //check wherther current with curent password exist or not
    $sql="SELECT *FROM dbl_admin WHERE id= $id AND password='$current_password'
    
    
    ";
     //execute query
     $res=mysqli_query($conn,$sql);
     if($res==TRUE)
       {
         $count=mysqli_num_rows($res);
           
           if($count==1 ){
                  //user exist  
             //echo'user found';
            //whether same new or confirm
               if($new_password==$confirm_password){
                   //udate password
                   //sql query
                   $sql2= "UPDATE dbl_admin SET
                   password='$new_password'
                   WHERE id=$id";
                   //execute
                   $res2=mysqli_query($conn,$sql2);
                   //check
                   if($res2==TRUE)
                   {
                      //redirect
                      $_SESSION['change-pwd']="password changed";
                      header("location:".SITEURL.'admin/manageadmin.php');
                   }
                   else{
                        //redirect
                      $_SESSION['change-pwd']="password didn't changed";
                      header("location:".SITEURL.'admin/manageadmin.php');
                     }

               }
               else{
                   //redirect
                   $_SESSION['password-not-match']="password not match";
                   header("location:".SITEURL.'admin/manageadmin.php');
               }
               
               }
            else{
                $_SESSION['user-not-found']="user not found";
                header("location:".SITEURL.'admin/manageadmin.php');
    
                }
       
         }
          
    //change pass if above true
   


    }

?>





<?php  include("partials/footer.php"); ?>