

<h2> view products</h2>

<table class="table table-bordered mt-5">
<thead class="bg-info">
<tr>
<th>product id</th>
<th>name</th>
<th>email</th>
<th>address</th>

<th>edit</th>
<th>delete</th>

</tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $number=0;
$get_products="select * from user_table ";
$result=mysqli_query($con,$get_products);
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['user_id'];
    $product_title=$row['username'];
    $product_image1=$row['user_email'];
    $product_price=$row['user_ip'];
    $number++;
echo '<tr class="text-center">
<th> '.$number.'</th>
<th> '.$product_title.'</th>
<th>'.$product_image1.'</th>
<th>'.$product_price.'</th>


<th><a href ="" class ="text-light"> edit</a></th>
<th><a href ="" class ="text-light"> delete</a></th>
</tr>';

}
?>
    

</tbody>
</table>