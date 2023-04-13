<?php  include("partials/menu.php"); ?>
<div class="main">
     <div class="mgk">
         <h1>ADD category</h1>
         <br><br>
         <?php
             if(isset($_SESSION['add'])){
                 echo $_SESSION['add'];
                unset($_SESSION['add']);//remove session 
             }
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
                         <input type="text" name=" title" placeholder="category title">
                     </td>
                 </tr>
                 <tr>
                    <td>
                        select image
                    </td>
                    <td><input type="file" name="image" ></td>
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
                        <input type="submit" name="submitform" value="add category" class="btn-secoendary">

                    </td>
                </tr>
                
               
                 
             </table>
         </form>

         <?php
if (isset($_POST['submitform']))
{
    //echo 'clicked';
    $title=$_POST['title'];
    if(isset($_POST['featured']))
    {
        $featured=$_POST['featured']; 
    }
    else{
        $featured ="no";
    }

    if(isset($_POST['active']))
    {
        $active=$_POST['active'];
    }
    else{
        $active ="no";
    }
    //here image is selcted or not and set value
     if(isset($_FILES['image']['name']))
     {
        //upload image
          //to upload image image name and source path and destiation path
         $image_name=$_FILES['image']['name'];
         //upload image only if image aailable
         if($image_name!="")
         {

         
         //auto renaming
         //get extension of imag
         $ext= end(explode('.',$image_name));
         //rename
         $image_name="food_category_".rand(000,999).'.'.$ext;


          $source_path=$_FILES['image']['tmp_name'];
         $destination_path="../img/category/".$image_name;
         //upload image 
         $upload=move_uploaded_file($source_path,$destination_path);
         //check
         /*if($upload==FALSE)
         {
          $_session['upload'] ="failed to upoload image";
          header("location:".SITEURL.'/admin/add_category.php');
          die();
         }*/
        }
     }
     else{
         //dont upload image and set the image name avalue blank 
         $image_name=" ";
     }

    //sql query to insert
    $sql="INSERT INTO dbl_category SET
    title='$title',
    image_name='$image_name',
    featured='$featured',
    active='$active'
    ";
    //execute query
    $res=mysqli_query($conn,$sql);
    if($res==TRUE)
    {
        //qury execute
        $_session['add'] ="<script>alert ('category added successfully')</script>";
        //redirect
        header("location:".SITEURL.'admin/managecategory.php');
    }
    else{
        //fail
        $_session['add'] ="category not added";
        //redirect
        header("location:".SITEURL.'admin/managecategory.php');
    }
   
}




?>
     </div>
 </div>





<?php  include("partials/footer.php"); ?>