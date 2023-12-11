
<?php
include("includes/connect.php");
include('functions/common-function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website using php and mysql</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   
<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light bg-info ">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">products</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="./user_area/user_registeration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();?></a>
        </li>
      </ul>
      <form class="d-flex ">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<?php
cart();
?>
<!-- <p> secod child</p> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto ">
<?php
if(!isset($_SESSION['username'])){
 echo '<li class="nav-item">
          <a class="nav-link" href="#">welcome guest</a>
        </li>';
}
else{
       echo' <li class="nav-item">
          <a class="nav-link" href="#">welcome '.$_SESSION['username'].' </a>
        </li>';
}
        ?>
        <li class="nav-item">
        <a class="nav-link" href="./user_area/user_login.php">login </a>
      </li>
</ul> 
</nav>

<!-- <p> third child</p> -->

<div class="bg-light">
<h3 class="text-center">Hidden Store </h3>
<p class="text-center">communication is at the heart of e-commerce and  community</p>
</div>


<!-- <p> 4 child</p> -->

<div class="row px-3">
   
    <div class =" col-md-10 ">
<!-- progucts -->
<div class="row">
            <?php
          get_all_products();
          get_unique_brand();
          get_unique_category();
        //   $ip = getIPAddress();  
        //  echo 'User Real IP Address - '.$ip;  
            ?>
       
     </div>
    </div>

    <div class =" col-md-2 bg-secondary p-0">
        <!-- brands -->
    <ul class="navbar-nav me-auto text-center">
         <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#"><h4>Delivery Brands</h4></a>
        </li>
        <?php
          
          getbrands();

        ?>
        


    </ul>
    <!-- Categories -->
    <ul class="navbar-nav me-auto text-center">
         <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#"><h4>Categories</h4></a>
        </li>
        <?php
           getcategory();

        ?>
        <!-- <li class="nav-item ">
          <a class="nav-link text-light" href="#">Arabic coffee</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="#">Robusta Coffee</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="#">Liberica</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="#">Specialty Coffee</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="#">Excelsa</a>
        </li> -->


    </ul>
    </div>

</div>


<!-- <p> last child</p> -->
<?php
 include("./includes/footer.php");
?>
</div>










<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>