<?php include("partials/menu.php")?>
<div class="main">
     <div class="mgk">
         <h1>ADD food</h1>
         <br><br>
         <?php
             
             if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
               unset($_SESSION['upload']);//remove session 
            }
             ?>

               <form action="" method="post" enctype="multipart/form-data">
             <table class="tbl_30">
                 <tr>
                     <td>
                         title
                     </td>
                     <td>
                         <input type="text" name=" title" placeholder="Food title">
                     </td>
                 </tr>
                 <tr>
                     <td>
                        description
                     </td>
                     <td>
                         <textarea name="description"  cols="30" rows="5" placeholder="Description of the food.">

                         </textarea>
                     </td>
                 </tr>
                 <tr>
                     <td>
                        price
                     </td>
                     <td>
                         <input type="number" name="price">

                         
                     </td>
                 </tr>
                 <tr>
                    <td>
                        select image
                    </td>
                    <td><input type="file" name="image" ></td>
                </tr>
                <tr>
                     <td>
                        category
                     </td>
                     <td>
                         <select name="category" >
                             <?php
                             //create php to disply categories 
                             //sql query to get all active category
                             $sql="SELECT*FROM dbl_category WHERE active='yes'";
                              // execute query
                              $res=mysqli_query($conn,$sql);
                              //cheak whether the data is available o rot
                             $count =mysqli_num_rows($res);
                             if($count>0)
                             {//we have categories
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    //get details of category
                                    $id=$row['id'];
                                    $title=$row['title'];
                                    ?>

                                    <option value="<?php echo $id?>"><?php echo $title?></option>
                                    <?php

                                }
                             }
                             else{
                                 //we dont have categories
                                 ?>

                                 <option value="0">No category found</option>
                                 <?php
                                 }




                              ?>
                             
                         </select>

                         
                     </td>
                 </tr>
                 <tr>
                   <td>featured</td>
                   <td><input type="radio" name="featured" value="yes">yes
                     <input type="radio" name="featured" value="no">no
                  </td>
                   </tr>
                 
                   <tr>
                   <td>Active</td>
                   <td><input type="radio" name="active" value="yes">yes
                     <input type="radio" name="active" value="no">no
                  </td>
                   </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submitform" value="add food" class="btn-secoendary">

                    </td>
                </tr>
                
               
                 
             </table>
         </form>

         </div>
 </div>

 <?php  
//check button clicked or not
if(isset($_POST['submitform']))
{
    //echo 'button clicked';
    //get all value form update
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];
   //whether radio button for featured and active are checked yes or no
   if(isset($_POST['featured']))
   {
       $featured=$_POST['featured'];
   }
   else
   {
       $featured="no";//setting default value
   }
   if(isset($_POST['active']))
   {
       $featured=$_POST['active'];
   }
   else
   {
       $featured="no";//setting default value
   }
   //cheacke image or not
   if(isset($_FILES['image']['name']))
   {
       //get details of image
       $image_name=$_FILES['image']['name'];
       //check is selct or not
       if($image_name!="")
       {
           //image is selcted
            //get extension of imag
         $ext= end(explode('.',$image_name));
           //rename
         $image_name="food_name".rand(0000,9999).'.'.$ext;

        //get path to upload 
         $source_path=$_FILES['image']['tmp_name'];
        $dst="../img/food/".$image_name;
        //upload image 
        $upload=move_uploaded_file($source_path,$dst);
        if($upload==false)
         {
          $_session['upload'] ="<div class='error'>failed to upoload image</div>";
          header("location:".SITEURL.'/admin/add_food.php');
          die();

          }
      
          }
         else
         {
            $image_name="";//default blank
         }
         //create sql to to insert data
        //for num value not pass inside code string value is in codes
    $sql2="INSERT INTO dbl_food SET
    title='$title',
    description='$description',
    price=$price,
    image_name='$image_name',
    category_id=$category,
    featured='$featured',
    active='$active'
    ";
    //execute query
    $res2=mysqli_query($conn,$sql2);
    if($res2==TRUE)
    {
        //qury execute
        $_session['add'] ="<script>alert('Food added successfull')</script>";
        //redirect
        header("location:".SITEURL.'admin/managefood.php');
    }
    else{
        //fail
        $_session['add'] ="<div class='error'>food not added</div>";
        //redirect
        header("location:".SITEURL.'admin/managefood.php');
    }
}


  
}



?>












<?php include("partials/footer.php")?>