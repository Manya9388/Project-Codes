<?php
session_start();
include ('config.php');
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
    $product_id=$_POST['product_id'];
    $product=$_POST['product'];
   
    $price=$_POST['price'];
    $size=$_POST['size'];
    $colour=$_POST['colour'];
    $occassion=$_POST['occassion'];
    $quantity=$_POST['quantity'];
      
$query="UPDATE tbl_products SET product='$product',price='$price',size='$size',colour='$colour',occassion='$occassion',quantity='$quantity' where product_id='$product_id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Product updated successfully";
    header('location:adminhome.php');
}
else
{
    echo "no";
}
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styleedit.css">
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
      UPDATE PRODUCTS
    </div>
   
    <div class="form">
    <input type="hidden"name="product_id"value="<?= $row['product_id'] ?>">
       <div class="inputfield">
          <label>Product Name</label>
          <input type="text" class="input" name="product" placeholder="product" value="<?= $row['product'] ?>" required>
       </div> 
       <div class="inputfield">
          <label>Price</label>
          <input type="text" class="input" name="price" placeholder="price" value="<?= $row['price'] ?>" required>
       </div> 
       <div class="inputfield">
          <label>Size</label>
          <input type="text" class="input" name="size" placeholder="size" value="<?= $row['size'] ?>" required>
       </div>  
       <div class="inputfield">
          <label>Colour</label>
          <input type="text" class="input" name="colour" placeholder="colour" value="<?= $row['colour'] ?>" required>
       </div>
       <div class="inputfield">
          <label>Occassion</label>
          <input type="text" class="input" name="occassion" placeholder="occassion" value="<?= $row['occassion'] ?>" required>
       </div>
       <div class="inputfield">
          <label>Quantity</label>
          <input type="text" class="input" name="quantity" placeholder="quantity" value="<?= $row['quantity'] ?>" required>
       </div> 
       
              
      <div class="inputfield">
        <input type="submit" value="UPDATE" name="submit" class="btn">
      
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>
