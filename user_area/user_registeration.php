<?php
include("../includes/connect.php");
 include('../functions/common-function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register user</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
    
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Registration  user Form</h5>
                        <form acthion="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input required type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input  required type="email" class="form-control" id="email"  name="email" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input  required type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input  required type="password" class="form-control" id="confirmPassword" name="confirm" placeholder="Confirm password">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea   required class="form-control" id="address" rows="3" name="address" placeholder="Enter your address"></textarea>
                            </div>
                            <button type="submit" name="register" class="btn btn-primary">register</button>
                            <p> Aleady have account?<a href ="user_login.php"> login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>

<?php
if(isset($_POST['register'])){
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$hash_password=password_hash($hash_password,PASSWORD_DEFAULT);
$confirm=$_POST['confirm'];
$address=$_POST['address'];
$user_ip=getIpAddress();
}

$select_query="select * from user_table where username='$username' or user_email='$email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo "<script> alert('user name and email already exist')</script>";
}
else if($password!=$confirm){
    echo "<script> alert('passwords not match')</script>";
}
else{
$insert_query="insert into user_table (username,user_email,user_password,user_ip,address)
values (' $username', '$email','$hash_password' ,'$address ', '$user_ip'  )";
$sql_excute=mysqli_query($con,$insert_query);
if($sql_excute){
    echo "<script> alert('data inserted successfully')</script>";
}
else{

    die(mysqli_error($con));
}
}


//select cart items'
$select_cart_item="select * from cart_details where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_item);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
$_SESSION['username']=$username;
    echo "<script> alert('you have item in a cart')</script>";
    echo "<script> window.open('checkout.php','_self')</script>";

}
else{
    echo "<script> window.open('../display_all.php','_self')</script>";

}
?>