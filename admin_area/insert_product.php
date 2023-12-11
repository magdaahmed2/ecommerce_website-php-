<?php
include("../includes/connect.php");

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['product_dec'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $status = "true";

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_product_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_product_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_product_image3 = $_FILES['product_image3']['tmp_name'];

    if (
        $product_title == '' || $description == '' || $product_keyword == '' ||
        $product_category == '' || $product_brands == '' || $product_price == '' ||
        $product_image1 == '' || $product_image2 == '' || $product_image3 == ''
    ) {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_product_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_product_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_product_image3, "./product_images/$product_image3");

        $insert_products = "INSERT INTO products (product_title, product_dec, product_keyword,
            category_id, brand_id, product_image1, product_image2, product_image3, product_price,
            date, status) VALUES ('$product_title', '$description', '$product_keyword',
            '$product_category', '$product_brands', '$product_image1', '$product_image2',
            '$product_image3', '$product_price', Now(), '$status')";
            
        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('Successfully inserted the product')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert product admin Dashboard</title>
     <!-- bootstrap link -->
     <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
<div class="container mt-3">
    <h1 class="text-center"> insert product </h1>
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="form-outline mb-4 w-50 m-auto">
            <lable for ="product_title" class="form-lable">product title</lable>
            <input type ="text" name="product_title" id="product_title" class="form-control"
            placeholde="enter product title" autocomplete="off" required="required">
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <lable for ="product_dec" class="form-lable">product description</lable>
            <input type ="text" name="product_dec" id="product_dec" class="form-control"
            placeholde="enter product description" autocomplete="off" required="required">
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <lable for ="product_ keyword" class="form-lable">product keyword</lable>
            <input type ="text" name="product_keyword" id="product_ keyword" class="form-control"
            placeholde="enter product  keyword" autocomplete="off" required="required">
        </div>
         

        <div class="form-outline mb-4 w-50 m-auto">
           <select name="product_category" id =""
           class="form-select">
           <option value=""> select category</option>
           <?php
               $select_categories="select * from categories";
               $result_categories=mysqli_query($con,$select_categories);
               
               
               while($row=mysqli_fetch_assoc($result_categories)){
                   $category_title=$row['category_title'];
                   $category_id=$row['category_id'];
               echo  "<option value='$category_id'> $category_title</option>";
               }  


           ?>
           
</select>

                </div>


                <div class="form-outline mb-4 w-50 m-auto">
           <select name="product_brands" id =""
           class="form-select">
           <option value=""> select brand</option>

           <?php
               $select_brands="select * from brands";
               $result_brands=mysqli_query($con,$select_brands);
               
               
               while($row=mysqli_fetch_assoc($result_brands)){
                   $brand_title=$row['brand_title'];
                   $brand_id=$row['brand_id'];
               echo  "<option value='$brand_id'> $brand_title</option>";
               }  


           ?>
           </select>

                </div>
    

                <div class="form-outline mb-4 w-50 m-auto">
            <lable for ="product_ image1" class="form-lable">product image 1</lable>
            <input type ="file" name="product_image1" id="product_ image1" class="form-control"
            placeholde="enter product  image1" autocomplete="off" required="required">
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <lable for ="product_ image2" class="form-lable">product image 2</lable>
            <input type ="file" name="product_image2" id="product_ image2" class="form-control"
            placeholde="enter product  image2" autocomplete="off" required="required">
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <lable for ="product_ image3" class="form-lable">product image 3</lable>
            <input type ="file" name="product_image3" id="product_ image3" class="form-control"
            placeholde="enter product  image3" autocomplete="off" required="required">
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <lable for ="product_ price" class="form-lable">product price</lable>
            <input type ="text" name="product_price" id="product_ price" class="form-control"
            placeholde="enter product  price" autocomplete="off" required="required">
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3"
            value="Insert Products">
        </div>
    </form>
</div>






  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
</body>
</html>