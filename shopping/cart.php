<?php

    include ('config.php');
    if(isset($_POST['item_cart_btn'])){
        $product_id= $_POST['product_id'];
       
        $quantity= $_POST['quantity'];

        $sql= "INSERT INTO tbl_cart VALUES(null,$product_id,0, $quantity,1)";
        $cart_res= mysqli_query($conn, $sql);
        if($cart_res){
            echo "<script>
                alert(' Added to cart successfully.');
                window.location.href='shopping-cart.php?product_id=$product_id';
            </script>";
        }
        else{
            echo "<script>
                alert('Unable to add to cart !! Please try again');
                window.location.href='my_account.php?product_id=$product_id';
            </script>";         
        }
    }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylescadd.css">
  </head>
  <body>
    <form method="POST" action="#">
    <?php
     if(isset($_GET['product_id']))
     {
$product_id=$_GET['product_id'];
$query=mysqli_query($conn,"select * from tbl_products where product_id='$product_id'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="wrapper">
    <div class="title">
      Add to cart
    </div>
   
    <div class="form">
    <input type="hidden"name="product_id"value="<?= $row['product_id'] ?>">
       <div class="inputfield">
          <label> </label>
          <?php echo htmlentities($row['product']);?>
</div>
<div class="form">
 <label>  Quantity:</label> <input type="text"name="quantity" placeholder="enter quantity">
       
</div>
      <div class="inputfield">
        <input type="submit" value="Add to Cart" name="item_cart_btn" class="btn">
      </div>
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>