<head>
<link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin=anonymous>

<script src=//code.jquery.com/jquery-3.3.1.slim.min.js integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin=anonymous></script>

<script src=//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin=anonymous></script>

<script src=//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin=anonymous></script>

<script src=//code.jquery.com/jquery-3.5.1.slim.js integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin=anonymous></script>
<link rel="stylesheet" href="css/profile.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php

if(isset($_SESSION['prfilid']))
{ $pfid=$_SESSION['prfilid'];
    
}

?>
<?php 

include("constraint.php");
include("function.php");

$getuserdetail= getUserDetailsByid();
 ?>
 <?php
if(isset($_SESSION['userup']))
{
    echo $_SESSION['userup'];
    unset($_SESSION['userup']);//remove session 
}
?>

<div class="backprofile">
<a href="shop.php" style="    border: 1px solid #00000030;
    border-radius: 10px;
    padding: 5px;">Back</a>
</div>
<div class="container">
<div class="row">
      
        <div class="col-lg-4">
           <div class="profile-card-4 z-depth-3">
            <div class="card">
              <div class="card-body text-center bg-primary rounded-top">
               <div class="user-box">
                <img src="img/user_profile/<?php 
                    echo $getuserdetail['profile_img'] ?>" alt="user avatar">
              </div>
              
              <h2 class="mb-1 text-white"><?php echo $getuserdetail['name']?></h2>
              <h6 class="text-light">Active customer</h6>
             </div>
              <div class="card-body">
                <ul class="list-group shadow-none">
                <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-phone-square"></i>
                  </div>
                  <div class="list-details">
                    <span><?php echo $getuserdetail['mobile']?></span>
                    <small>Mobile Number</small>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="list-details">
                    <span><?php echo $getuserdetail['email']?></span>
                    <small>Email Address</small>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-globe"></i>
                  </div>
                  <div class="list-details">
                    <span>haripur kalan</span>
                    <small>Address</small>
                  </div>
                </li>
                </ul>
                <div class="row text-center mt-4">
                  <div class="col p-2">
                   <h4 class="mb-1 line-height-5">154</h4>
                    <small class="mb-0 font-weight-bold">Orders</small>
                   </div>
                    <div class="col p-2">
                      <h4 class="mb-1 line-height-5">2.2k</h4>
                     <small class="mb-0 font-weight-bold">Total Order</small>
                    </div>
                    <div class="col p-2">
                     <h4 class="mb-1 line-height-5">2.5km</h4>
                     <small class="mb-0 font-weight-bold">Near</small>
                    </div>
                 </div>
               </div>
              
             </div>
           </div>
        </div>
        <div class="col-lg-8">
           <div class="card z-depth-3">
            <div class="card-body">
            <ul class="nav nav-pills nav-pills-primary nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active show"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                </li>
               
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#changepass" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Change password</span></a>
                </li>
            </ul>
            <div class="tab-content p-3">
                <div class="tab-pane active show" id="profile">
                    <h3 class="mb-3"><?php echo $getuserdetail['name']?></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Email</h6>
                            <p>
                            <?php echo $getuserdetail['email']?> 
                            </p>
                            <h6>Mobile</h6>
                            <p>
                            <?php echo $getuserdetail['mobile']?>
                            </p>
                        </div>
                       
                    </div>
                    <!--/row-->
                </div>
                
                
               
                <div class="tab-pane" id="edit">
                    <form method="POST" action="profileupdate.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $getuserdetail['name']?>"name="username" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mobile</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $getuserdetail['mobile']?>"name="usermobile" required>
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value="<?php echo $getuserdetail['email']?>" name="useremail" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="image"type="file">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="" name="address"placeholder="Street">
                                <input type="hidden" name="type"value="profile">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                
                                <input type="submit" class="btn btn-primary" name="saveuser"value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="changepass">
                    <form method="POST" action="profileupdate.php">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">old_password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value=""name="old_pass" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">new_password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value=""name="new_pass" required>
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                               
                                <input type="submit" class="btn btn-primary" name="chanpass"value="Change password">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      </div>
        
    </div>
</div>

