

    <h2> view products</h2>

<table class="table table-bordered mt-5">
<thead class="bg-info">
<tr>
<th>product id</th>
<th>title</th>
<th>image</th>
<th>price</th>

<th>edit</th>
<th>delete</th>

</tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $number=0;
$get_products="select * from products ";
$result=mysqli_query($con,$get_products);
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $number++;
echo '<tr class="text-center">
<th> '.$number.'</th>
<th> '.$product_title.'</th>
<th><img src="./product_images/'.  $product_image1.'" class="imm"</th>
<th>'.$product_price.'</th>


<th><a href ="" class ="text-light"> edit</a></th>
<th><a href ="" class ="text-light"> delete</a></th>
</tr>';

}
?>
    

</tbody>
</table>