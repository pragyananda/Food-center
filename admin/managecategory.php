<?php include("partials/menu.php")?>
<div class="main ">
    <div class="mgk"> <h1>Manage category</h1></div>
    <br><br>
           <!-- button-->
           <a href="add_category.php" class=" btn-primary cat">ADD category</a>
           <br>
           <br><br><br>
        <?php
           if(isset($_SESSION['delete']))
             {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);//remove session 
             }
             if(isset($_SESSION['remove']))
             {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);//remove session 
             }
             if(isset($_SESSION['add']))
             {
                echo $_SESSION['add'];
                unset($_SESSION['add']);//remove session 
             }
             if(isset($_SESSION['no-category-found']))
             {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);//remove session 
             }
                
                
                ?>
           <table class="tbl_full">
               <tr>
                   <th>
                        Serial no.
                   </th>
                   <th>
                      Title
                       </th>
                       <th>Image
                       
                       </th>
                       <th>Featured
                       
                       </th>
                       <th>Active
                       
                       </th>
                       <th>Actions
                       
                    </th>
               </tr>
               <?php
                  //selct category form database
                 $sql="SELECT * FROM dbl_category";
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
                          $image_name=$row['image_name'];
                          $featured=$row['featured'];
                          $active=$row['active'];
                         ?>
                            <tr>
                   <td><?php echo $sn++;?></td>
                   <td><?php echo $title;?></td>

                   <td> <?php 
                          //cheak image availabel
                          if($image_name!=="")
                          {
                              //disply
                              ?>
                              <img src="<?php echo SITEURL;?>img/category/<?php echo $image_name;?>" width="100px" >
                              <?php
                          }
                          else{
                              //dislly msg
                              echo "<div class='error'>image not added.</div>";
                          }
                   ?>
                  </td>

                   <td><?php echo $featured;?></td>
                   <td><?php echo $active;?></td>
                   <td> 
                  
                   <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>" class="btn-danger">Delete category</a>
                   </td>
                    </tr>
                         <?php

                      }
                      
                  }
                  else{
                      //we have'nt data
                      //we will disply in table
                      ?>
                      <tr>
                          <td colspan="6">
                              <div class="error">no category added</div>
                          </td>
                      </tr>
                      <?php
                  }
?>
            
              
           </table>
</div>



<?php include("partials/footer.php")?>



















