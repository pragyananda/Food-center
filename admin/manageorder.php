<?php include("partials/menu.php");
include("../function.php");?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="main ">
    <div class="mgk"> <h1>Manage order</h1></div>
           <table class="tbl_full">
               <tr>
                   <th> sl no.</th>
                        <th>Name/email/mobile</th>
                       
                       <th>Address/zipcode</th>
                       <th>price</th>
                       <th>order details</th>
                       <th>payment status</th>
                       <th>order status</th>
                       <th>delivery boy</th>
                       <th>added on</th>
                     
               </tr>
               <?php
               $sql="SELECT dbl_order.*,order_status.order_status as order_status_str from dbl_order,order_status where dbl_order .order_status=order_status.id order by id  ";
               $res=mysqli_query($conn,$sql);
               $check=mysqli_num_rows($res);
               
               if($check>0)
               {
                $i=1;
               while($row=mysqli_fetch_assoc($res))
               {?>
               <tr>
                   <td width ="5%"><?php echo $row['id']?></td>
                   <td  width ="20%"><?php echo $row['name']?><br>
                   <?php echo $row['email']?><br>
                   <?php echo $row['mobile']?><br>
                </td>
                  
                   <td width ="20%"><?php echo $row['address']?>
                   <br><?php echo $row['zipcode']?>
                </td>
                   <td>&#8377;<?php echo $row['total_price']?></td>
                   <td> 
                   <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Details</button> 
                   <div id="demo" class="collapse">
                       <table style="border:1px solid black;">
                       <tr><th>name</th>
                      <th>qty</th>
                      <th>price</th></tr>
                     <?php $getorderdetail=getorderdetails($row['id']) ;
                    foreach($getorderdetail as $list){
                      ?>
                    
                      <tr>
                          <td style="padding:5px;"><?php echo $list ['title']?></td>
                          <td>  <?php echo $list ['qty']?></td>
                          <td>&#8377;<?php echo $list ['price']?></td>
                      </tr>
                      <?php
               }
                     ?>
                   </table> 
                   </td>
                   <td><?php echo $row['payment_status']?></td>
                   <td width ="5%"><?php echo $row['order_status_str']?></td>
                   <td ><?php echo $row['deliveryboy_name']?></td>
                   <td><?php echo $row['added_on']?></td>
                 
                  
               </tr>
               <?php
               }
            
            }?>
          
              
           </table>
          
               </div>
</div>





<?php include("partials/footer.php")?>