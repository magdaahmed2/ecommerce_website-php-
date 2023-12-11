<?php
include("../includes/connect.php");
include('../functions/common-function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<style>
    .imm{
        width:10%;
        object-fit:contain;
    }
</style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info ">

    <div class="container-fluid">
    <img src="../images/download (7).jpg" alt="" class="logo">
    <nav class="navbar navbar-expand-lg  ">
       <ul class="navbar-nav  ">

            <li class="nav-item">
               <a class="nav-link" href="admin_login.php">login</a>
           </li>
          
           <li class="nav-item">
               <a class="nav-link" href="admin_register.php">register</a>
           </li>
          
           
           <li class="nav-item">
               <a class="nav-link" href="#">welcome guest</a>
           </li>
           
           <li class="nav-item">
               <a class="nav-link" href="../display_all.php">home</a>
           </li>
          
</ul> 
    </nav>

    </div>
    </nav>

<!-- second child -->
<div class="bg-light">


<h3 class="text-center p-2">manage details</h3>

</div>
  <!-- 3 child -->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
       <div class="p-3">
        <a href="#">    <img src="../images/download (3).jpg" alt="" class="admin-image"></a>
        <p class=" text-light text-center">Admin name </p>
       </div>
       <div class="button text-center">

       <button class="my-3"><a href="insert_product.php"class="nav-link text-light bg-info my-1">Insert Products</a></button>
       <button ><a href="index.php?view_products"class="nav-link text-light bg-info my-1"> View product</a></button>
       <button ><a href="index.php?insert_category"class="nav-link text-light bg-info my-1"> Insert Categories </a></button>
       <button ><a href=""class="nav-link text-light bg-info my-1"> View  Categories</a></button>
       <button ><a href="index.php?insert_brands"class="nav-link text-light bg-info my-1">  Insert Brands </a></button>
       <button ><a href=""class="nav-link text-light bg-info my-1"> View Brands </a></button>
       <button ><a href=""class="nav-link text-light bg-info my-1">All Orders </a></button>
       <button ><a href=""class="nav-link text-light bg-info my-1"> All payments</a></button>
       <button ><a href="index.php?list_user"class="nav-link text-light bg-info my-1">list user </a></button>
       <button ><a href=""class="nav-link text-light bg-info my-1"> logout</a></button>
       </div>

    </div>
</div>
  <!-- 4 child -->

  <div class="container my-3">
    <?php
    if(isset($_GET['insert_category'])){
        include('insert_category.php');

    }
    if(isset($_GET['insert_brands'])){
        include('insert_brands.php');

    }
    if(isset($_GET['view_products'])){
        include('view_products.php');

    }
    if(isset($_GET['list_user'])){
        include('list_user.php');

    }
    
    ?>
  </div>

<!-- <p> last child</p> -->
<!-- <div class="bg-info p-3 text-center footer">

<p>All rights reserved</p>

</div> -->
    </div>












<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>