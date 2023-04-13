<?php  session_start();
      include("function.php");
      
      unset ( $_SESSION['prfilid']);
      unset ( $_SESSION['prfilname']);

      redirect('index.php');
   
       ?>