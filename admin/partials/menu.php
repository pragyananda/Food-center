<?php  include("constraint.php");
       include("partials/logincheck.php");
?>


<html>
    <head>
        <title>food center</title>
        <link rel="stylesheet" href="adstyle.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <!--menu -->
        <div class="menu text_center">
            <div class="mgk">
                     <ul>
                         <li>
                             <a href="index.php" class="hm">Home</a>
                            
                             <a href="managecategory.php"class="hm">category</a>
                             <a href="managefood.php"class="hm">food</a>
                             <a href="manageorder.php"class="hm">order</a>
                             <a href="logout.php"class="hm">Logout</a>
                         </li>
                     </ul>
            </div>
        </div>