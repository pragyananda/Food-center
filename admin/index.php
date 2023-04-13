<?php include("partials/menu.php")?>
        <!--main -->
        <div class="main">
            <div class="mgk ">
           <h1>Dashboard</h1><br><br>
           <?php
                if(isset($_SESSION['logins'])){
                    echo $_SESSION['logins'];
                   unset($_SESSION['logins']);//remove session 
                }
                if(isset($_SESSION['no-login-msg'])){
                    echo $_SESSION['no-login-msg'];
                    unset($_SESSION['no-login-msg']);//remove session 
                     }
    



             ?>
        <br><br>
            <div class="col-4 text_center">
                <h1>   <?php
            $sql="SELECT * FROM dbl_category";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            echo $count;
            ?></h1>
                <br>
              Categories
            </div>
            <div class="col-4 text_center">
                <h1><?php
            $sql="SELECT * FROM dbl_food";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            echo $count;
            ?></h1>
                <br>
               Foods
            </div>
            <div class="col-4 text_center">
                <h1><?php
            $sql="SELECT * FROM dbl_order";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            echo $count;
            ?></h1>
                <br>
               Oreders
            </div>
            <div class="col-4 text_center">
                <h1><?php
            $sql="SELECT SUM(total_price) as total_price FROM dbl_order";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($res);
            $count=mysqli_num_rows($res);
            $totalres =$row['total_price'];
            
            ?>
            <?php echo "&#8377;".$totalres.".00"?></h1>
                <br>
             Total Bill
            </div>
           
           <div class="clearfix">

           </div>
            </div>
        </div>
    <?php include("partials/footer.php")?>