   <?php
        include("header.php") ;

        
        
       ?>
       <?php
       if(isset($_SESSION['addsuc']))
       {
           echo $_SESSION['addsuc'];
           unset($_SESSION['addsuc']);//remove session 
       }
       
       if(isset($_SESSION['alexist']))
       {
           echo $_SESSION['alexist'];
           unset($_SESSION['alexist']);//remove session 
       }
       
       if(isset($_SESSION['emaillogin']))
       {
           echo $_SESSION['emaillogin'];
           unset($_SESSION['emaillogin']);//remove session 
       }
       if(isset($_SESSION['alertqty']))
       {
           echo $_SESSION['alertqty'];
           unset($_SESSION['alertqty']);//remove session 
       }
      



?>
      
       <div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="shop">Shop</a></li>
                    </ul>
                </div>
            </div>
        </div>
      
      <div class="shop-page-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="banner-area pb-30">
                            <a href="shop.php"><img alt="" src="assets/img/banner/banner-49.jpg"></a>
                        </div>
                        <?php
                         
                              $food_sql="SELECT * FROM dbl_food WHERE featured='yes' "; 
                         
                       
                       

                        $food_sql.="order by id ";
                       
                        
                        $food_res=mysqli_query($conn,$food_sql);
                        ?>
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <div class="row">
                                    <?php
                                    while($food_row=mysqli_fetch_assoc($food_res)){
                                       
                                       
                                    ?>
                                   
                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                    <form action="addtocart.php" method="POST">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="shop">
                                                <img src="<?php echo SITEURL;?>img/food/<?php echo $food_row['image_name'];?>" width="50px" >
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                
                                                <h4>
                                                    <a href="javascript:void(0)"><?php echo $food_row['title']?> </a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span><?php echo $food_row['description']?></span>
                                                </div>
                                                <div class="product-price-wrapper" >
                                                    <span >&#8377; <?php echo $food_row['price']?></span>
                                                </div>
                        
                                                    <input type="hidden" name="id" value="<?php echo $food_row['id'];?>"id="id" >
                                                   
                                                    
                                                    <input type="hidden" name="fname" value="<?php echo $food_row['title'];?>" >
                                                    <input type="hidden" name="price" value="<?php echo $food_row['price'];?>" >
                                                    <input type="number" id="quantity" name="quantity" value="min='1' max='20'" placeholder="quantity" required>
                                                <button type="submit" name ="addcart"class="addtcart"onclick="execute()" > <span>Add to cart</span></button>
                                                  
                                               </form>
                                               
                                                
                                                
                                            </div>
										</div>
                                    </div>
                                    </form>
								<?php  }?>
									
									
								</div>
                            </div>
                            
                        </div>
                    </div>
                    <?php
                     $cat_res=mysqli_query($conn,"SELECT * FROM dbl_category WHERE active='yes'")


                     ?>
                   
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Shop By Categories</h4>
                                <div class="shop-catigory">
                                    <ul id="faq">
                                        <?php
                                          while($cat_row=mysqli_fetch_assoc($cat_res)){
                                           echo" <li> <a href='shop.php?cat_id".$cat_row['id']."'>". $cat_row['title']."</a></li>";   
                                          }
                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
      
      
      <?php
       include("footer.php")
       
       
       ?>
       <!--add to cart function-->
      

      
      
      
        
		


</html>
