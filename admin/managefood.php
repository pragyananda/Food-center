<?php include("partials/menu.php")?>

<div class="main ">
    <div class="mgk"> <h1>Manage Foods</h1></div>
    <br><br>

    <?php
             
             if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
               unset($_SESSION['add']);//remove session 
               if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
               unset($_SESSION['delete']);//remove session 
            }
            }
             ?>
           <!-- button-->
           <a href="<?php echo SITEURL;?>admin/add_food.php?>" class=" btn-primary cat">ADD food</a>
           <br>
           <br><br><br>
           <table class="tbl_full">
           <tr>
                   <th>
                        S N.
                   </th>
                   <th>
                      title
                       </th>
                       <th>price
                       
                       </th>
                       
                       <th>image
                       
                       </th>
                       <th>featured
                       
                       </th>
                       <th>active
                       
                       </th>
                       <th>Actions
                       
                    </th>
               </tr>
               <?php
                  //selct category form database
                 $sql="SELECT * FROM dbl_food";
                 //execute
                 $res=mysqli_query($conn,$sql);
                 //count rows
                 $count=mysqli_num_rows($res);
                 //create serial no
                 $sn=1;
                 
                 //check datawe have
                  if($count>0){
                       //we have data
                       while($row=mysqli_fetch_assoc($res))
                       {
                           $id=$row['id'];
                           $title=$row['title'];
                           $price=$row['price'];
                           $image_name=$row['image_name'];
                           $featured=$row['featured'];
                           $active=$row['active'];
                           ?>
                                   
                          <tr>
                         <td><?php echo $sn++;?></td>
                          <td><?php echo $title;?></td>
                          <td><?php echo $price;?>rs</td>
                   <td><?php 
                    //cheak image availabel
                   if($image_name!="")
                   {
                      
                         //disply
                         ?>
                         <img src="<?php echo SITEURL;?>img/food/<?php echo $image_name;?>" width="100px" >
                         <?php
                     
                   }
                   else{  //dislly msg
                    echo "<div class='error'>image not added.</div>";
                       
                   }
                   
                   ?></td>
                   
                   <td><?php echo $featured;?></td>
                   <td><?php echo $active;?></td>
                   <td> 
                   
                   <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>" class="btn-danger">Delete food</a>
                   </td>
                          </tr>
                           <?php
                         
                       }
                  }   
                
                ?>

            
              
           </table>
</div>




<?php include("partials/footer.php")?>