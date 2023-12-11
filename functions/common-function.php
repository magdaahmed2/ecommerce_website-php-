<?php
// include('./includes/connect.php');
function getproducts(){
 global $con;
    $select_query = "SELECT * FROM products ORDER BY   rand () LIMIT 0,3";
    $result_query = mysqli_query($con, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_dec = $row['product_dec'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];

        echo  '<div class="col-md-4 mb-2">
               <div class="card">
                  <img src="./admin_area/product_images/' . $product_image1 . '" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">' . $product_title . '</h5>
                    <p class="card-text">' . $product_dec . '</p>
                    <p class="card-text">' . $product_price . '</p>
                    
                    <a href="product_details.php?product_id=' . $product_id . '" class="btn btn-secondary">View More</a>
                    <a href="index.php?addtocart=' .$product_id.' " class="btn btn-info">Add to Cart</a>
                    </div>
               </div>
             </div>';
    }


}

// get all product
function get_all_products(){
    global $con;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    
    $select_query = "SELECT * FROM products order by rand() ";
    $result_query = mysqli_query($con, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_dec = $row['product_dec'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];

        echo  '<div class="col-md-4 mb-2">
               <div class="card">
                  <img src="./admin_area/product_images/' . $product_image1 . '" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">' . $product_title . '</h5>
                    <p class="card-text">' . $product_dec . '</p>
                    <p class="card-text">' . $product_price . '</p>
                    <a href="product_details.php?product_id=' . $product_id . '" class="btn btn-secondary">View More</a>
                    <a href="index.php?addtocart=' .$product_id.' " class="btn btn-info">Add to Cart</a>
                  </div>
               </div>
             </div>';
    }

}
    }}


// display brands

function getbrands(){
$select_brands="select * from brands";
global $con;
$result_brands=mysqli_query($con,$select_brands);
// $row_data=mysqli_fetch_assoc($result_brands);
// echo $row_data['brand_title'];
while($row_data=mysqli_fetch_assoc($result_brands)){
    $brand_title=$row_data['brand_title'];
    $brand_id=$row_data['brand_id'];
echo " <li class='nav-item'>
<a href='index.php?brands=$brand_id' class='nav-link text-light'>$brand_title</a>
</li>";
}
}

function getcategory(){
$select_categories="Select * from categories";
global $con;
$result_categories=mysqli_query($con,$select_categories);
// $row_data=mysqli_fetch_assoc($result_brands);
// echo $row_data['brand_title'];
while($row_data=mysqli_fetch_assoc($result_categories)){
    $category_title=$row_data['category_title'];
    $category_id=$row_data['category_id'];
echo " <li class='nav-item'>
<a href='index.php?categories=$category_id' class='nav-link text-light'>$category_title</a>
</li>";
}
}

// getting unique brands
function get_unique_brand(){
   
    global $con;
    if(isset($_GET['brands'])){
        $brand_id=$_GET['brands'];
        $select_query="Select * from products where brand_id=$brand_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>no brand available for this</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_dec = $row['product_dec'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];
    
            echo  '<div class="col-md-4 mb-2">
                   <div class="card">
                      <img src="./admin_area/product_images/' . $product_image1 . '" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">' . $product_title . '</h5>
                        <p class="card-text">' . $product_dec . '</p>
                        <p class="card-text">' . $product_price . '</p>
                        <a href="product_details.php?product_id=' . $product_id . '" class="btn btn-secondary">View More</a>
                        <a href="index.php?addtocart=' .$product_id.' " class="btn btn-info">Add to Cart</a>
                       
                        </div>
                   </div>
                 </div>';
        }
    
    }
}





// getting unique brands
function get_unique_category(){
   
    global $con;
    if(isset($_GET['categories'])){
        $category_id=$_GET['categories'];
        $select_query="select * from products where category_id=$category_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>no category available for this</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_dec = $row['product_dec'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];
    
            echo  '<div class="col-md-4 mb-2">
                   <div class="card">
                      <img src="./admin_area/product_images/' . $product_image1 . '" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">' . $product_title . '</h5>
                        <p class="card-text">' . $product_dec . '</p>
                        <p class="card-text">' . $product_price . '</p>
                        <a href="product_details.php?product_id=' . $product_id . '" class="btn btn-secondary">View More</a>                  </div>
                        <a href="index.php?addtocart=' .$product_id.' " class="btn btn-info">Add to Cart</a>
                       
                        </div>
                 </div>';
        }
    
    }
}

function veiw_details() {
    global $con;

    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM products WHERE product_id = $product_id";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            // Retrieve product details
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_dec = $row['product_dec'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];

            // Display product details
            echo '<div class="col-md-4 mb-2">
                    <div class="card">
                      <img src="./admin_area/product_images/' . $product_image1 . '" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">' . $product_title . '</h5>
                        <p class="card-text">' . $product_dec . '</p>
                        <p class="card-text">' . $product_price . '</p>
                        <a href="product_details.php?addtocart=' .$product_id.' " class="btn btn-info">Add to Cart</a>
                       
                      </div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <!-- related image -->
                    <div class="row">
                      <div class="col-md-12">
                        <h4 class="text-center">Related products</h4>
                      </div>
                      <div class="col-md-6">
                        <img src="./admin_area/product_images/' . $product_image2 . '" class="card-img-top" alt="...">
                      </div>
                      <div class="col-md-6">
                        <img src="./admin_area/product_images/' . $product_image3 . '" class="card-img-top" alt="...">
                      </div>
                    </div>
                  </div>';
        }
    }
}




//get ip adderss function

    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//cart function
function cart() {
    if (isset($_GET['addtocart'])) {
        global $con;
        $get_ip_address = getIPAddress();
        $get_product_id = $_GET['addtocart'];
        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address' AND 
        product_id = $get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        
        if ($num_of_rows > 0) {
            echo "<script> alert('Item is already in the cart')</script>";
            echo "<script> window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_address', 0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script> alert('Item addded to cart')</script>";

            echo "<script> window.open('index.php','_self')</script>";
        }
    }
}
//cart item number
function cart_item(){
    if (isset($_GET['addtocart'])) {
        global $con;
       
        $get_ip_address = getIPAddress();
        $get_product_id = $_GET['addtocart'];
        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address' ";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_item= mysqli_num_rows($result_query);
        
        
        } else {
            global $con;
            
        $get_ip_address = getIPAddress();
        
        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address' ";
         
        $result_query = mysqli_query($con, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);
        }
    echo $count_cart_item;
}

//total cart price
function total_cart_price(){
    global $con;
    $total_price=0;
    $get_ip_address = getIPAddress();
    $cart_query="select * from cart_details where ip_address='$get_ip_address'"  ;
    $result=mysqli_query($con, $cart_query)  ;
    while ($row = mysqli_fetch_assoc($result)) {
        
        $product_id=$row['product_id'];
        $select_products="select * from products where product_id='$product_id'" ;

$result_products=mysqli_query($con, $select_products)  ;
    while ($row_product_price = mysqli_fetch_assoc($result_products)) {
        $product_price=array($row_product_price ['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;

}}
echo $total_price;
}




?>