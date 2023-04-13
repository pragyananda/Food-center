<?php include("header.php");
include("function.php"); ?>
<?php
 $userarr=getUserDetailsByid();
 $usrid=$userarr['id'];
if(isset($_POST['place_order']))

{

     $checkout_name=($_POST['checkout_name']); 
      $checkout_email=($_POST['checkout_email']);
      $checkout_mobile=($_POST['checkout_mobile']);
      $checkout_zip=($_POST['checkout_zip']);
      $checkout_address=($_POST['checkout_address']);
      $checkout_paymenttype=($_POST['payment_type']);
      $added_on=date('Y-m-d h:i:s');
      $sqlq="INSERT INTO dbl_order SET
     users_id='".$_SESSION['prfilid']."',
     name='$checkout_name',
     email='$checkout_email',
     mobile='$checkout_mobile',
     address='$checkout_address',
     zipcode='$checkout_zip',
     payment_type='$checkout_paymenttype',
    total_price='$subtotal',
    deliveryboy_id='akhand',
     payment_status='pending',
     order_status='1',
     added_on='$added_on'
      ";
      mysqli_query($conn,$sqlq);
      $insert_id=mysqli_insert_id($conn);
      $_SESSION['order_id']=$insert_id;
  
    $food_sql="SELECT * FROM dbl_cart WHERE users_id='$usrid' "; 
   
    $food_res=mysqli_query($conn,$food_sql);
    while($cart_row=mysqli_fetch_assoc($food_res)){
        $fuserid=$cart_row['users_id'];
    $foodid=$cart_row['food_id'];
    $foodprice=$cart_row['price'];
    $foodqty=$cart_row['qty'];
      mysqli_query($conn, "INSERT INTO order_detail set order_id='$insert_id', food_details_id='$foodid', price='$foodprice', qty='$foodqty' ");
       emptyCart();
       if($checkout_paymenttype=='cod')
       {
        $_SESSION['placeorder']="<script>swal('Congratulations!', 'Your order placed successfully!', 'success');</script>";
        redirect(SITEURL.'successorder.php');
       }
       if($checkout_paymenttype=='Paytm')
       {
        $html='<form method="post" action="paytm_php/pgRedirect.php" name="frmpayment">
		<input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="'.$insert_id.'">
				<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="'.$usrid.'"></td>
				<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				<input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
				<input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="'.$subtotal.'">
				<input value="CheckOut" type="submit"	onclick=""></td>
	</form>
    <script type="text/javascript">
			document.frmpayment.submit();
		</script>';
        echo $html ;
       }
     
    }

    
}
?>
<div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active"> Checkout </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- checkout-area start -->
        <div class="checkout-area pb-80 pt-100">
            <div class="container">
                <div class="row" style="position:relative;" >
                    <div >
                        <div class="checkout-wrapper"style="width:100%;position:absolute;z-index:1;">
                            <div id="faq" class="panel-group">
                            <?php
                                                 if(isset($_SESSION['prfilid']))
                                                 { $pfid=$_SESSION['prfilid'];
                                                    $subtotal=0;
                                                    
                                                 }
                                               
                                                 $sql="SELECT *FROM dbl_cart where users_id=$pfid";
                                                
                                                 $res=mysqli_query($conn,$sql); 
                                                 $check=mysqli_num_rows($res);
                                                 while($row=mysqli_fetch_assoc($res)){
                                                      
                                                    $subtotal +=($row['qty']*$row['price']);

                                                 }
                                                 ?>
                                                 <?php if($subtotal!=0)
                                                        {
                                                            

                                                    ?>
                                                     
                                         
                                <div class="panel panel-default">
                                   
                                    <div id="payment-2" class="panel-collapse ">
                                                      <div class="checkout-progress"align=center>
                                                      <h4>Shiping information</h4>
                                                      </div>
                                        <div class="panel-body">
                                        
                                            <form  method="POST">
                                            <div class="billing-information-wrapper">
                                           
                                                <div class="row" >
                                                
                                                    <div class="col-lg-6 col-md-6">
                                                      
                                                        <div class="billing-info">
                                                        <label>First Name</label>
																<input type="text" name="checkout_name" required value="<?php echo $userarr['name'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                        <label>Email Address</label>
																<input type="email"  name="checkout_email" required value="<?php echo $userarr['email'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                        <label>Mobile</label>
																<input type="text"  name="checkout_mobile" required value="<?php echo $userarr['mobile'];?>">
                                                        </div>
                                                    </div>
                                                   
                                                  
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                        <label>Zip/Postal Code</label>
																<input type="text"  name="checkout_zip" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="billing-info">
                                                        <label>Address</label>
																<input type="text"  name="checkout_address" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ship-wrapper">
														<div class="single-ship">
															<input type="radio" name="payment_type" value="cod">
															<label>Cash on Delivery(COD)</label>
														</div>
                                                        <div class="single-ship">
															<input type="radio" name="payment_type" value="Paytm" checked="checked">
															<label>Paytm</label>
														</div>
														
													</div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        
                                                    </div>
                                                    <div class="billing-btn">
                                                    <button type="submit" name="place_order">Place Your Order</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
         
                </div>
             </div>
        </div>
       
        
        <?php
}
else{
    echo '<script>alert("Your cart is empty")</script>';
}
?>


      
        