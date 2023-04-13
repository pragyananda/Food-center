<?php include("header.php")


?>
<?php
if(isset($_SESSION['deletecart']))
{
    echo $_SESSION['deletecart'];
    unset($_SESSION['deletecart']);//remove session 
}

?>


<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form  method="POST">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                        
                                            
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>added on</th>

                                            
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if(isset($_SESSION['prfilid']))
                                    { $pfid=$_SESSION['prfilid'];
                                        $subtotal=0;
                                    }
                                    

                                    
                                   
                                    $sql="SELECT *FROM dbl_cart where users_id=$pfid";
                                    $res=mysqli_query($conn,$sql);  
                                    while($row=mysqli_fetch_assoc($res)){
                                         $id=$row['id'];
                                         $subtotal +=($row['qty']*$row['price']);
                                    
                                        
                                    ?>
                                    
                                        <tr>
                                           <?php
                                           $total=($row['qty']*$row['price']);
                                           
                                           
                                            ?>
                                           
                                            <td class="product-name"><a href="#"><?php echo $row['food_name']?></a></td>
                                            <td class="product-price-cart"><span class="amount">&#8377; <?php echo $row['price']?></span></td>
                                            <td class="product-quantity"> <?php echo $row['qty'];?></td>
                                            <td class="product-subtotal">&#8377; <?php echo $total;?></td>
                                            <td class="product-subtotal"><?php echo $row['added_on']?></td>
                                            <td class="product-remove">
                                                
                                                
                                                <a href="<?php echo SITEURL;?>actioncart.php?id=<?php echo $id;?>" class="btn-danger" style="color: white;border-radius: 10px;padding: 8px;">Delete</a>
                                           </td>
                                         
                                        </tr>
                                        <?php
                                    }
                                ?>
                              
                                    </tbody>
                                    

                                </table>
                               <div style="font-size: 30px;margin-left: 80%;font-weight: bold;color: #dc3545;margin-top: 10px;"> <?php
                                    echo  'Total : &#8377;' .$subtotal;
                                    
                                    
                                    ?></div>

                                
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="shop.php">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                         
                                            <a href="checkout.php"target="_blank">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
        
       
       
        