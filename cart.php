
<?php
include("includes/connect.php");
include('functions/common-function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catt datails</title>
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
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();?></a>
        </li> -->
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

<li class="nav-item">
          <a class="nav-link" href="#">welcome guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">login</a>
        </li>
</ul> 
</nav>

<!-- <p> third child</p> -->

<div class="bg-light">
<h3 class="text-center">Hidden Store </h3>
<p class="text-center">communication is at the heart of e-commerce and  community</p>
</div>


<!-- <p> 4 child</p> -->

 <div class="container">
<div class="row">
    <form action="" method="post"> 
    <table class="table table-border ">
       

<!-- php code -->
<?php
global $con;
$total_price = 0;
$get_ip_address = getIPAddress();
$cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
$result = mysqli_query($con, $cart_query);
$result_count= mysqli_num_rows($result);
if($result_count>0){
    echo  ' <thead>
    <tr>
        <td>title</td>
        <td>image</td>
        <td>quantity</td>
        <td>totalprice</td>
        <td>remove</td>
        <td>operation</td>

    </tr>
</thead>';
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['product_id'];
    $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
    $result_products = mysqli_query($con, $select_products);

    while ($row_product = mysqli_fetch_assoc($result_products)) {
        $product_price = $row_product['product_price'];
        $product_title = $row_product['product_title'];
        $product_image1 = $row_product['product_image1'];

        $product_values = $product_price;  // No need for array_sum here

        $total_price += $product_values;
?>

        <tr>
            <td><?php echo $product_title ?></td>
            <td><img src="./images/<?php echo $product_image1 ?>" alt="" class="image-cart"></td>
            <td><input class="form-input" type="number" name="qty" id="">
       
        </td>
        <?php
          global $con;
           $get_ip_address = getIPAddress();
           if(isset($_POST['update_cart'])){
            $quantity=$_POST['qty'];
            $update_cart="update cart_details set  quantity='$quantity' where ip_address='$get_ip_address'";
            $result_products_quantity = mysqli_query($con, $update_cart);
            $total_price=$total_price * $quantity;
           }
        ?>
            <td><?php echo $product_price?></td>

            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
            <td>
                <!-- <button class="bg-info px-3 py-2 mx-3 text-light  border-0"type="submit" name="update_cart">Update</button>
                <button class="bg-info px-3 py-2 mx-3 text-light  border-0" >Remove</button> -->
                <input type="submit" value="update_cart"
                 class="bg-info px-3 py-2 mx-3 text-light  border-0" name="update_cart">

                 <input type="submit" value="remove_cart"
                 class="bg-info px-3 py-2 mx-3 text-light  border-0" name="remove_cart">
            </td>
        </tr>
 
        
<?php
    }
}}

else{
    echo "<h2 class='text-center text-danger'>cart is empty</h2>";
}
?>

    </table>
<div class="d-flex mb-5">
<?php  
    global $con;
    // $total_price = 100;  // Replace with your actual total price
    $get_ip_address = getIPAddress();
    $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
    $result = mysqli_query($con, $cart_query);
    $result_count = mysqli_num_rows($result);

    if ($result_count > 0) {
        echo '<h4 class="px-3">Subtotal: <strong class="text-info">$' . $total_price . '</strong></h4>';
        echo '<input type="submit" value="Continue Shopping" name="Continue_Shopping" class="bg-info px-3 py-2 mx-3 text-light border-0"
        Continue Shopping >';
        echo '<button class="bg-secondary px-3 mx-3 text-light border-0"><a href="./user_area/checkout.php">Checkout</a></button>';
    } else {
        echo '<input type="submit" value="Continue Shopping" name="Continue_Shopping" class="bg-info px-3 py-2 mx-3 text-light border-0"
        Continue Shopping >';
    }
    if(isset($_POST['Continue_Shopping'])){
        echo "<script> window.open('display_all.php','_self')</script>";
    }
?>

    
</div>
</div>

 </div>
</form>

<!-- removeitem -->
<?php
function remove_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem']as $remove_id ) {
            echo $remove_id;
            $delete_query="Delete from cart_details where product_id= $remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script> window.open('cart.php','_self')</script>";
            }
        }
}
}


echo $remove_item=remove_item();

?>

<!-- <p> last child</p> -->
<?php
 include("./includes/footer.php");
?>
</div>










<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>