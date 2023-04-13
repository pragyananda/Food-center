<?php
include('file:///C:/xampp/htdocs/project/config/constraint.php');
// get id  to delete
$id=$_GET['id'];
//create sql query o delete
$sql="DELETE FROM dbl_cart WHERE id=$id";
//execute query
$res = mysqli_query($conn,$sql);
//check 
if($res==TRUE)
{
   
    //create session to disply
    $_SESSION['deletecart']="<script>swal({
        title: 'Are you sure?',
        text: '!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal('Poof! Your cart item has been deleted!', {
            icon: 'success',
          });
        }
      });</script>";
    header('location:'.SITEURL.'cart.php');

}
else{
   
    //create session to disply
    $_SESSION['deletecart']="<script>swal({
        title: 'Are you sure?',
        text: 'If Don't like !',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal('Poof! Your cart item has been deleted!', {
            icon: 'success',
          });
        } else {
          swal('Your cart item is safe!');
        }
      });</script>";
    header('location:'.SITEURL.'cart.php');
    
}

?>