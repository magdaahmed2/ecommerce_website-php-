
<?php
include("../includes/connect.php");
include('../functions/common-function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>

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
                        <h5 class="card-title">login  admin  Form</h5>
                        <form acthion="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input  name="username" required type="text" class="form-control" id="username" placeholder="Enter username">
                            </div>
                           
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password"  type="password" class="form-control" id="password" placeholder="Enter password">
                            </div>
                            
                            
                            <button type="submit"  name ="login" class="btn btn-primary">login</button>
                            <p> sign up<a href ="user_registeration.php"> register</a></p>
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

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $select_query="select * from admin_table where username='$username' ";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIpAddress();

    //cart item
    $select_query="select * from  cart_details  where ip_address='$user_ip' ";
    $select_cart=mysqli_query($con,$select_query);
    $rows_count_cart=mysqli_num_rows($select_cart);

    if($rows_count>0){
        $_SESSION['username']=$username;
        if(password_verify($password,$row_data['password'])){
            // echo "<script> alert('login successfully')</script>";
            if($rows_count==1 and $rows_count_cart==0){
                $_SESSION['username']=$username;
                echo "<script> alert('login successfully')</script>";
                echo "<script> window.open('profile.php', '_self')</script>";
            }
        
        else{
            $_SESSION['username']=$username;
            echo "<script> alert('login successfully')</script>";
                echo "<script> window.open('payment.php', '_self')</script>";
        }
    }
        else{
        echo "<script> alert('invalid username or password 111')</script>";
        echo "<script> window.open('index.php', '_self')</script>";
        }
    }

    else{
        echo "<script> alert('login successfully')</script>";
        echo "<script> window.open('index.php', '_self')</script>";
        }

    }
?>