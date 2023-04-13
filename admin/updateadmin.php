<?php  include("partials/menu.php"); ?>

<div class="main">
    <div class="mgk">
        <h1>
            Update admin
        </h1><br><br>
        <?php
           //get id of selected admin
           $id=$_GET['id'];

           //create sql to get details
           $sql="SELECT*FROM dbl_admin WHERE id =$id";
           // execute query
        $res=mysqli_query($conn,$sql);
        //cheak
        if($res==TRUE)
        {
            //cheak whether the data is available o rot
            $count =mysqli_num_rows($res);
            //cheak whether admin hhave or not
            if($count==1)
            {
            //get details
            //echo'adminavailable';
            $row=mysqli_fetch_assoc($res);
            $full_name=$row['full_name'];
            $username=$row['username'];

        
        }
            else{
//redierect manage admin
header('location:'.SITEURL.'admin/manageadmin.php');
            }
        }




?>
        <form action="" method="POST">
             <table class="tbl_30">
                 <tr>
                     <td>
                         full name
                     </td>
                     <td>
                         <input type="text" name=" full_name" value="<?php echo $full_name;?>">
                     </td>
                 </tr>
                 <tr>
                 <td>username</td>
                 <td><input type="text" name="username" value="<?php echo $username;?>"></td>
                 </tr>
                 
                 <tr>
                     <td colspan="2">
                         <input type="hidden" name="id" value="<?php echo $id;?>">
                          <input type="submit" name="submitform" value="Update admin" class="btn-secoendary">
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
    //get all value form update
    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    //create sql query to update
    $sql="UPDATE dbl_admin SET
    full_name='$full_name',
    username='$username'
    WHERE id='$id'
    ";
    //execute query
    $res=mysqli_query($conn,$sql);
    //check
    if($res==TRUE)
    {
      $_SESSION['update']="<div class='success'>admin updated</div>";
      header("location:".SITEURL.'admin/manageadmin.php');
    }
    else{
        $_SESSION['update']="<div class='error'>admin not updated</div>";
        header("location:".SITEURL.'admin/manageadmin.php');
    }
}



?>


<?php  include("partials/footer.php"); ?>