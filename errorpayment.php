<?php include("header.php");
include("function.php");
if(!isset( $_SESSION['order_id'])){
    redirect(SITEURL.'shop.php');
} ?>
<?php
   if(isset($_SESSION['placeorder']))
   {
       echo $_SESSION['placeorder'];
       unset($_SESSION['placeorder']);//remove session 
   }


?>
<div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="shop.php">Home</a></li>
                        <li class="active">about us </li>
                    </ul>
                </div>
            </div>
        </div>
<div class="about-us-area pt-50 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-7 d-flex align-items-center">
                        <div class="overview-content-2">
                            <h2>Order <span> Placed</span> Failed!<h3>order id:<?php echo  $_SESSION['order_id']?></h3> </h2>
                            
                          
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
<?php unset( $_SESSION['order_id'])?>
        <?php include("footer.php") ?>
        