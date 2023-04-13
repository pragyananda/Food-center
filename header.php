<?php 

include("constraint.php");
include("logincheckuser.php");
 ?>


<!doctype html>
<html class="no-js" lang="zxx">
<head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Food center</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/chosen.min.css">
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="shortcut icon" href="assets\img\fevfcentr.png" type="image/x-icon">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
   
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
    function goTocartURL() {
      location.href = 'cart.php';

    }
    function goTocheckoutURL() {
      location.href = 'checkout.php';

    }
  </script>
    </head>
    <body>
        <!-- header start -->
        <header class="header-area">
            <div class="header-top black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 col-sm-4">
                            <div class="welcome-area">
                                
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 col-sm-8">
                            <div class="account-curr-lang-wrap f-right">
                                <ul>
                             
                                    
                                    <li class="top-hover"><a href="#">
                                        <?php
                                        if(isset($_SESSION['prfilname'])){
                                            echo 'Welcome '.$_SESSION['prfilname'];

                                        }
                                        else{

                                        }

 
                                    
                                    ?>
                                    <i class="ion-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="profile.php">Profile </a></li>
                                            <li><a href="cart.php"> MY cart</a></li>
                                            <li><a href="contactus.php">Contact us</a></li>
                                            <li><a href="logout.php"> Logout</a></li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                            <div class="logo">
                                <a href="shop">
                                    <img alt="" src="assets/img/logo/headerlogo.png" width="250px">
                                </a>
                            </div>
                        </div>
                          
                        <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                            <div class="header-middle-right f-right">
                                <div class="header-login">
                                  
                                </div>
                                <div class="header-wishlist">
                                   &nbsp;
                                </div>
                                <div class="header-cart">
                                    <a href="cart.php">
                                        <div class="header-icon-style">
                                            <i class="icon-handbag icons"></i>
                                            <span class="count-style">
                                                <?php
                                                 if(isset($_SESSION['prfilid']))
                                                 { $pfid=$_SESSION['prfilid'];
                                                    $subtotal=0;
                                                    
                                                 }
                                                 $sql="SELECT *FROM dbl_cart where users_id=$pfid";
                                                 $res=mysqli_query($conn,$sql); 
                                                 $check=mysqli_num_rows($res);
                                                 echo $check;
                                                 while($row=mysqli_fetch_assoc($res)){
                                                  
                                                    $subtotal +=($row['qty']*$row['price']);

                                                 }
                                                 ?>
                                            </span>
                                        </div>
                                        <div class="cart-text">
                                            <span class="digit">My Cart</span>
                                            <span class="cart-digit-bold">&#8377;<?php
                                            if($subtotal!=0)
                                            {
                                                echo $subtotal;}
                                                ?>.00</span>

                                        </div>
                                    </a>
                                   <?php
                                    if($subtotal!=0)
                                            {
                                                ?>
                                    <div class="shopping-cart-content">
                                        
                                        <div class="shopping-cart-total">
                                          
                                            <h4>Total : <span class="shop-total">&#8377;<?php echo $subtotal;?>.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            
                                            <a href='cart.php' onclick="goTocartURL(); return false;">cart</a>
                                            <a href="checkout.php"onclick="goTocheckoutURL(); return false;">checkout</a>
                                        </div>
                                    </div>
                                    <?php
                                    }?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom transparent-bar black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="shop.php">Home</a></li>
                                       
                                        <li><a href="about-us.php">about</a></li>
                                        <li><a href="contactus.php">contact us</a></li>
                                        <li>  <form class="form-inline my-2 my-lg-0 serch" action="<?php echo SITEURL;?>food-search" method="POST">
                                         <input class="form-control mr-sm-2" style="    border-radius: 10px 0px 0px 10px;"type="search" placeholder="Search" aria-label="Search">
                                        <button class="sbtn" type="submit">search</i></button>
                                         </form></li>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
         
                          
                        
            <!-- mobile-menu-area-start -->
			<div class="mobile-menu-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mobile-menu">
								<nav id="mobile-menu-active">
									<ul class="menu-overflow" id="nav">
                                    <li><a href="shop.php">Shop</a></li>
                                        <li><a href="about-us.php">about</a></li>
                                        <li><a href="contactus.php">contact us</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-menu-area-end -->
        </header>
    
       
       
